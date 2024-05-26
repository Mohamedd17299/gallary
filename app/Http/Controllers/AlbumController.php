<?php

namespace App\Http\Controllers;
use App\album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class AlbumController extends Controller
{
    
    
    public function index()
    {
        $all_reco = album::all();
        $cunt = 0;
        $full =[];
        while(count($all_reco)>$cunt){
            $co = DB::table('picture')->select(DB::raw('count(*) as count'))->where('album_id','=', $all_reco[$cunt]['id'])->get()[0]->count;
            $full = Arr::prepend($full, $co,$all_reco[$cunt]['id']);
            $cunt = $cunt+1;
        }
        return view('album.index',['album'=> $all_reco,'count'=>$full]);
    }
    

    
    public function selectalbum()
    { 
        $all_reco = album::all();
        $cunt = 0;
        $full =[];
        while(count($all_reco)>$cunt){
            $co = DB::table('picture')->select(DB::raw('count(*) as count'))->where('album_id','=', $all_reco[$cunt]['id'])->get()[0]->count;
            $full = Arr::prepend($full, $co,$all_reco[$cunt]['id']);
            $cunt = $cunt+1;
        }
        return  ['sele' => $all_reco,'count'=>$full];
    }

    
    public function store(Request $request)
    {
        $val = $_GET['val'];
        $album = new album();
        $album -> name=strip_tags($val);
        $album->save();
        return "add";
    }

    public function show($album)
    {
        $all_reco = album::findOrFail($album);
        $full= [];
        $co = DB::table('picture')->select(DB::raw('count(*) as count'))->where('album_id','=', $all_reco['id'])->get()[0]->count;
        $full = Arr::prepend($full, $co,$all_reco['id']);
        
        return view('album.show',[
            'album' => $all_reco,
            'count'=>$full
        ]);
        
    }

    
    public function edit($album)
    {
        
    }

    
    public function update()
    {
        try{
            $id = $_GET['id'];
            $val = $_GET['val'];
            $to_update = album::findOrFail($id);
            $to_update->name= strip_tags($val);
            $to_update->save();
            return "updated";
        } catch (Exception $e){
            return "error";
        }
    }

    
    public function destroy()
    {
        try{
            $album = $_GET['id'];
            $c_to_del = DB::table('picture')->select(DB::raw('count(*) as count'))->where('album_id','=', $album)->get()[0]->count;
            $to_del = ['album' => album::findOrFail($album)];
            if($c_to_del==0){
                $to_del = album::findOrFail($album);
                $to_del->delete();
                return 'delete';
            }else{
                return $to_del;
            }
        } catch (Exception $e){
            return "error";
        }
        
    }
}
