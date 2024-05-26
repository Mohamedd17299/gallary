<?php

namespace App\Http\Controllers;

use App\picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class PictureController extends Controller
{
    
    public function index()
    {
        return view('picture.show',[
            'picture' => picture::all()
        ]);
    }

    
    public function create()
    {
        $id = $_GET['album_id'];
        $name = $_GET['pic_name'];
        $dis = $_GET['pic_dis'];
        $picture = new picture();
        $picture -> album_id=strip_tags($id);
        $picture -> name=strip_tags($name);
        $picture -> discription=strip_tags($dis);
        $picture->save();
        return "add";
    }

    
    public function delete(Request $request)
    {
        if ($request->isMethod('delete')) {
            $filepond = $request->json()->all();
            $folder = $filepond['filename'];
            $path = storage_path('app/public/album/'.$folder);
            unlink($path);
            return response()->json(['filename' => $folder], 200);
        }
    }
    public function store(Request $request)
    {
            $file  = $request->file('add_picture');
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/album/', $filename);
            return response()->json(['filename' => $filename], 200);
    }

    
    public function move()
    {
        $id = $_GET['id'];
        $new_id = $_GET['new_id'];
        $type = $_GET['type'];
        if($type=="move"){
            $allpicture = DB::table('picture')->where('id', $id)->update(['album_id'=>$new_id]);
            return 'done';
        }else{
            $allpicture = DB::table('picture')->where('album_id', $id)->update(['album_id'=>$new_id]);
            $allalbum = DB::table('album')->where('id','=', $id)->delete();
            return 'done';
        }
        
    }

    
    public function destroyallalbum()
    {
        try{
        $album = $_GET['id'];
        $allpicture = DB::table('picture')->where('album_id','=', $album)->delete();
        $allalbum = DB::table('album')->where('id','=', $album)->delete();
        return "delete";
        } catch (Exception $e){
            return "error";
        }
    }

    
    public function update()
    
    {
        try{
            $id = $_GET['id'];
            $val = $_GET['val'];
            $to_update = picture::findOrFail($id);
            $to_update->name= strip_tags($val);
            $to_update->save();
            return "updated";
        } catch (Exception $e){
            return "error";
        }
    }

    
    public function destroy(picture $picture)
    {
        $picture = $_GET['id'];
        $picture = picture::findOrFail($picture);
        $picture->delete();
        return 'delete';
    }
}
