<?php
class alert
{
    function add(){
        echo "
            <form action=".route('album.store')." method='post' class='out-client-pick-area d-flex flex-column'>
                <span id='add_title' style='text-align:center; padding: 0 0 11px; font-size: 30px;'></span>
                <div class='input-group input-group album_name'>
                  <input type='text' class='form-control' placeholder='Album Name' aria-label='Small' name='album_name' id='album_name' aria-describedby='inputGroup-sizing-sm'>
                  <div class='form-error error-album-name d-none'></div>  
                    
                </div>
                <div class='input-group input-group select_album' style='padding-top:10px;'>
                    <select class='form-select select-album' type='text' name='select_album' id='select_album' autocomplete='off' required>
                    </select>
                    <div class='form-error error-select-album d-none'></div>  
                    
                </div>
                <div class='input-group input-group picture_name' style='padding-top:10px;'>
                  <input class='form-control' type='input'  placeholder='Picture Name' name='picture_name' id='picture_name' autocomplete='off' required />
                  <div class='form-error error-picture-name d-none'></div>  
                   
                </div>
                <div class='input-group input-group add_picture' style='padding-top:10px;'>
                  <input class='form-control' type='input'  placeholder='picture' name='add_picture' id='add_picture' autocomplete='off' required />
                  <div class='form-error error-add-picture d-none'></div>  
                    
                </div>
                <input id='add_id_hidden' name='add_id_hidden' style='display:none;'/>
                <div style='margin:20px 0 10px 0;'>
                    <div class='d-flex justify-content-center align-items-center'>
                        <button type='submit' style='margin:0px 5px;' id='sub_new' class='btn btn-outline-success btn-sm'>Add</button>
                        <button type='button' style='margin:0px 5px;' id='sub_close' class='btn btn-danger btn-sm'>Close</button>
                    </div>
                </div>
            </form>
        ";
    }
    function edit(){
        echo"
        <form id='edit_area_e' action=".route('album.update',[1])." method='post' class='out-client-pick-area d-flex flex-column'>
            <span id='edit_title' style='text-align:center; padding: 0 0 11px; font-size: 30px;'></span>
            <div class='input-group input-group album_name'>
              <input type='text' class='form-control' placeholder='Album Name' aria-label='Small' value='' name='album_name_e' id='album_name_e' aria-describedby='inputGroup-sizing-sm'>
              <div class='form-error error-album-name d-none'></div>  
            </div>
            <div class='input-group input-group select_album' style='padding-top:10px;'>
                <select class='form-select select-album' type='text' name='select_album_e' id='select_album_e' autocomplete='off' required>
                </select>
                <div class='form-error error-select-album d-none'></div>  
            </div>
            <div class='input-group input-group picture_name' style='padding-top:10px;'>
              <input class='form-control' type='input'  placeholder='Picture Name' name='picture_name_e' id='picture_name_e' autocomplete='off' required />
              <div class='form-error error-picture-name d-none'></div>  
            </div>
            <input id='edit_id_hidden' name='edit_id_hidden' style='display:none;'/>
            <div style='margin:20px 0 10px 0;'>
                <div class='d-flex justify-content-center align-items-center'>
                    <button type='submit' style='margin:0px 5px;' id='sub_edit' class='btn btn-outline-success btn-sm'>Edit</button>
                    <button type='button' style='margin:0px 5px;' id='edit_close' class='btn btn-danger btn-sm'>Close</button>
                </div>
            </div>
        </form>
        ";
    }
    function delet(){
        echo "
        <form class='out-client-pick-area d-flex flex-column'>
            <span class='title-delete-area' style='text-align:center; padding: 0 0 11px; font-size: 30px;'></span>
            <span class='dis-delete-area' style='text-align:center; padding: 0 0 11px; font-size: 23px;'></span>
            <div class='input-group input-group select_album_del' style='padding-top:10px;'>
                <select class='form-select select-album' type='text' name='select_album_del' id='select_album_del' autocomplete='off'>
                </select>
                <div class='form-error error-select-album d-none'></div>
            </div>
            <div style='margin:20px 0 10px 0;'>
                <div class='d-flex justify-content-center align-items-center'>
                    <button type='button' style='margin:0px 5px;' id='move_all_pic' class='btn btn-outline-success btn-sm'>Move to selected Album</button>
                    <button type='submit' style='margin:0px 5px;' id='del_all_pic' class='btn btn-outline-danger btn-sm'>Delete</button>
                    <button type='button' style='margin:0px 5px;' id='sub_close_del' class='btn btn-danger btn-sm'>Close</button>
                </div>
            </div>
        </form>
        ";
    }
}
?>