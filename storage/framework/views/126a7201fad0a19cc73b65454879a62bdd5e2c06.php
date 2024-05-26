<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title><?php echo $__env->yieldContent('title'); ?></title>

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jquery-ui@1.13.3/themes/base/tabs.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/filepond/4.31.1/filepond.min.css" integrity="sha512-TtQdiqlFBF4xOf9GCawalT4FQ7qihYm+EMYxpor3WzndeGC+NflmNd/P5AN8vvRH4XqTjoNrIeJRbZcifEMbWA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://kit.fontawesome.com/4c6d983434.js" crossorigin="anonymous"></script>
        <link href="<?php echo e(url('public/css/style.css?').time()); ?>" rel="stylesheet"> 
    </head>
    <body>
        <div  id="main_spinner" style="z-index: 5;"></div>
        <div class="d-flex justify-content-between  align-items-center" style="padding: 0 20px;">
            <div class="main-nav d-flex flex-row main-nav-btn"> 
                <div class="nav-btn album active-nav" click-type="album">Album</div>
                <div class="nav-btn picture" click-type="picture">Picture</div>
            </div>
            <div class="nav-btn back-nav-btn d-none" click-type="../album"> 
                <i class="fa-solid fa-arrow-left-long fa-lg"></i>
            </div>
            <div class="add-btn" id="sub_new_show">
                <i class="fa-solid fa-plus fa-lg" style="color: #000000;"></i>
            </div>
        </div>
        <div>
            <div class="add-area" id="dele_area">
                <?php
                include "resources/alert.php" ;
                $add_one = new alert();
                $delarea = $add_one ->delet();
                echo $delarea;
                ?>
                
            </div>
        </div>
        <div>
            <div class="add-area" id="add_area">
                <?php
                $addarea = $add_one ->add();
                echo $addarea;
                ?>
            </div>
        </div>
        <div>
            <div class="add-area" id="edit_area">
                <?php
                $editarea = $add_one ->edit();
                echo $editarea;
                ?>
            </div>
        </div>
        <div class="content">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-ui@1.13.3/dist/jquery-ui.min.js"></script>
    <script src="<?php echo e(url('public/js/main.js')); ?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/filepond/4.31.1/filepond.min.js" integrity="sha512-UlakzTkpbSDfqJ7iKnPpXZ3HwcCnFtxYo1g95pxZxQXrcCLB0OP9+uUaFEj5vpX7WwexnUqYXIzplbxq9KSatw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            
            
            const inputElement = document.querySelector('input[id="add_picture"]');
            const pond = FilePond.create(inputElement);
            FilePond.setOptions({
               server: {
                    allowImagePreview: true,
                    allowImageFilter: true,
                    imagePreviewHeight: 100,
                    allowFileTypeValidation: true,
                    allowRevert: true,
                    acceptedFileTypes: ["image/png", "image/jpeg", "image/jpg"],
                    url:'/upload' ,
                    restore: "public/upload/",
                    process: false, 
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
               }
            });
            
        </script>
    <script type='text/javascript'>
        $(document).ready(function(e){
            $('form').append('<?php echo e(csrf_field()); ?>');
            $('#edit_area_e').append('<input type="hidden" name="_method" value="PUT">');
            //srart spinner
            $('#main_spinner').html('<div class="iner_white_screen"><div class="circle_load"><div class="myani"></div></div></div>');
            setTimeout(function() {
                $('#main_spinner').html('');
            }, 500);
            
            //nav pages
            if(<?php echo json_encode($phpVar, 15, 512) ?>=="picture"){
                $(".picture").addClass("active-nav");
                $(".album").removeClass("active-nav");
            }else if(<?php echo json_encode($phpVar, 15, 512) ?>=="album"){
                $(".picture").removeClass("active-nav");
                $(".album").addClass("active-nav");
            }else if(<?php echo json_encode($phpVar, 15, 512) ?>=="show"){
                $(".main-nav-btn").addClass("d-none");
                $(".main-nav-btn").removeClass("d-flex");
                $(".back-nav-btn").removeClass("d-none");
            }
            
            //btn for navication pages
            $( ".nav-btn" ).click(function() { 
                var btn_name=$(this).attr('click-type');
                $('#main_spinner').html('<div class="iner_white_screen"><div class="circle_load"><div class="myani"></div></div></div>');
                setTimeout(function() {
                    $('#main_spinner').html('');
                    window.location.replace(btn_name);
                }, 500);
            });
            

            //start function
            function picturearea(){
                $(".picture").addClass("active-nav");
                $(".album").removeClass("active-nav");
                $('#add_title').html('Add Picture');
                $('#edit_title').html('Edit Picture');
                $('.album_name').html('');
            };
            function editpicturearea(){
                $(".picture").addClass("active-nav");
                $(".album").removeClass("active-nav");
                $('#add_title').html('Add Picture');
                $('#edit_title').html('Edit Picture');
                $('.album_name').html('');
                $('.select_album').html('');
            };
            function albumarea(){
                $(".picture").removeClass("active-nav");
                $(".album").addClass("active-nav");
                $('#add_title').html('Add Album');
                $('#edit_title').html('Edit Album');
                $('.picture_name').html('');
                $('.select_album').html('');
                $('.add_picture').html('');
            };
            function showarea(){
                $(".main-nav-btn").addClass("d-none");
                $(".main-nav-btn").removeClass("d-flex");
                $(".back-nav-btn").removeClass("d-none");
                $('#add_title').html('Add Picture');
                $('#edit_title').html('Edit Picture');
                $('.album_name').html('');
                $('.select_album').html('');
            };
            function editpicture(){
                var edit_id = $("#edit_id_hidden").attr("value");
                var edit_val = $("#picture_name_e").val();
                $.ajax({
                    url: '../editpicture',
                    type: 'GET',
                    data: { id:edit_id, val:edit_val },
                    success: function(response)
                    { 
                        if(response=="updated"){
                            location.reload();
                        }else if(response=="error"){
                            
                        }
                    }
                });
            }
            function editalbum(){
                var edit_id = $("#edit_id_hidden").attr("value");
                var edit_val = $("#album_name_e").val();
                $.ajax({
                    url: '../editalbum',
                    type: 'GET',
                    data: { id:edit_id, val:edit_val },
                    success: function(response)
                    { 
                        if(response=="updated"){
                            location.reload();
                        }else if(response=="error"){
                            
                        }
                    }
                });
            }
            function addpicture(){
                var add_type = $("#add_id_hidden").attr("add-type");
                var pic_dis = $(".filepond--file-info-main").html();
                var sta = $(".filepond--file-status-main").html();
                if(add_type=="picture_album_no"){
                    var pic_name = $("#picture_name").val();
                    var album_id = $(".edit_album").attr('value');
                }else{
                    var pic_name = $("#picture_name").val();
                    var album_id = $("#select_album").val();
                }
                if(sta=="Upload complete"){
                    var don = "done";
                }else{
                    var don="";
                }
                if(pic_dis==null||pic_name==null||album_id==null||don==""){
                    console.log("0");
                }else{
                    $.ajax({
                        url: '../addpicture',
                        type: 'GET',
                        data: { pic_name:pic_name, album_id:album_id, pic_dis:pic_dis },
                        success: function(response)
                        { 
                            if(response=="add"){
                                location.reload();
                            }else if(response=="error"){
                                
                            }
                        }
                    });
                }
                /*
                
                */
            }
            function addalbum(){
                var add_val = $("#album_name").val();
                $.ajax({
                    url: '../addalbum',
                    type: 'GET',
                    data: { val:add_val },
                    success: function(response)
                    { 
                        if(response=="add"){
                            location.reload();
                        }else if(response=="error"){
                            
                        }
                    }
                });
            }
            //end function

            //btn to show add section
            $( "#sub_new_show" ).click(function() {
                if(<?php echo json_encode($phpVar, 15, 512) ?>=="picture"){
                    picturearea();
                    $("#add_id_hidden").attr("click-type","picture");
                    $("#add_id_hidden").attr("add-type","picture_album_yes");
                }else if(<?php echo json_encode($phpVar, 15, 512) ?>=="album"){
                    albumarea();
                    $("#add_id_hidden").attr("click-type","album");
                }else if(<?php echo json_encode($phpVar, 15, 512) ?>=="show"){
                    showarea();
                    $("#add_id_hidden").attr("click-type","picture");
                    $("#add_id_hidden").attr("add-type","picture_album_no");
                }
                $("#add_area").css("display", "block");
            });


            //btn for submit add section
            $( "#sub_new" ).click(function(e) { 
                e.preventDefault();
                if(<?php echo json_encode($phpVar, 15, 512) ?>=="picture"){
                    var picture_name = $('#picture_name').val();
                    var select_album = $('#select_album').val();
                    var add_picture = $('.filepond--file-info-main').html();
                    if(picture_name === ""){
                        $('.error-picture-name').html('Picture name is required');
                        $('.error-picture-name').removeClass("d-none");
                    }
                    if(select_album === ""){
                        $('.error-select-album').html('Select Album is required');
                        $('.error-select-album').removeClass("d-none");
                    }
                    if(add_picture === ""){
                        $('.error-add-picture').html('Picture is required');
                        $('.error-add-picture').removeClass("d-none");
                    }else{
                        addpicture();
                    }

                }else if(<?php echo json_encode($phpVar, 15, 512) ?>=="album"){
                    var  album_name = $('#album_name').val();
                    if(album_name === ""){
                        $('.error-album-name').html('Album name is required');
                        $('.error-album-name').removeClass("d-none");
                    }else{
                        addalbum();
                    }

                }else if(<?php echo json_encode($phpVar, 15, 512) ?>=="show"){
                    var  picture_name = $('#picture_name').val();
                    var  add_picture = $('.filepond--file-info-main').html();
                    if(picture_name === ""){
                        $('.error-picture-name').html('Picture name is required');
                        $('.error-picture-name').removeClass("d-none");
                    }
                    if(add_picture === ""){
                        $('.error-add-picture').html('Picture is required');
                        $('.error-add-picture').removeClass("d-none");
                    }else{
                        addpicture();
                    }
                }
            });

            //btn to submit edit section
            $( "#sub_edit" ).click(function(e) {
                e.preventDefault();
                if(<?php echo json_encode($phpVar, 15, 512) ?>=="picture"){
                    var picture_name = $('#picture_name_e').val();
                    var select_album = $('#select_album_e').val();
                    var add_picture = $('#add_picture_e').val();
                    if(picture_name === ""){
                        $('.error-picture-name').html('Picture name is required');
                        $('.error-picture-name').removeClass("d-none");
                    }
                    if(select_album === ""){
                        $('.error-select-album').html('Select Album is required');
                        $('.error-select-album').removeClass("d-none");
                    }
                    if(add_picture === ""){
                        $('.error-add-picture').html('Picture is required');
                        $('.error-add-picture').removeClass("d-none");
                    }else{
                        editpicture();
                    }

                }else if(<?php echo json_encode($phpVar, 15, 512) ?>=="album"){
                    var  album_name = $('#album_name_e').val();
                    if(album_name === ""){
                        $('.error-album-name').html('Album name is required');
                        $('.error-album-name').removeClass("d-none");
                    }else{
                        editalbum();
                    }

                }else if(<?php echo json_encode($phpVar, 15, 512) ?>=="show"){
                    var  picture_name = $('#picture_name_e').val();
                    var  add_picture = $('#add_picture_e').val();
                    if(picture_name === ""){
                        $('.error-picture-name').html('Picture name is required');
                        $('.error-picture-name').removeClass("d-none");
                    }
                    if(add_picture === ""){
                        $('.error-add-picture').html('Picture is required');
                        $('.error-add-picture').removeClass("d-none");
                    }else{
                        var edit_type = $("#edit_id_hidden").attr("click-type");
                        if(edit_type=="picture"){
                            editpicture();
                        }else if(edit_type=="album"){
                            editalbum();
                        }
                    }
                }
                
            });
            
            //btn to show edit album
            $( ".edit_album" ).click(function(e) {
                albumarea(); 
                var e_name = $(this).attr('name');
                var e_no = $(this).attr('value');
                $("#edit_id_hidden").attr("value",e_no);
                $("#edit_id_hidden").attr("click-type","album");
                $("#edit_area").css("display", "block");
                $('#album_name_e').val(e_name);
                $('#album_name_e').focus();
            });
            
            //btn to show edit picture
            $( ".edit_pic" ).click(function(e) {
                editpicturearea(); 
                var e_name = $(this).attr('name');
                var e_no = $(this).attr('value');
                $("#edit_id_hidden").attr("value",e_no);
                $("#edit_id_hidden").attr("click-type","picture");
                $("#edit_area").css("display", "block");
                $('#picture_name_e').val(e_name);
                $('#picture_name_e').focus();
            });
            
            //btn to move picture
            $( ".move_pic" ).click(function(e) {
                $("#dele_area").css("display", "block");
                $("#del_all_pic").css("display", "none");
                var pic_id = $(this).attr('value');
                var mov_id = $(this).attr('album_id');
                var mov_name = $(this).attr('album_name');
                var res2 = mov_name.replaceAll(" ", "_");
                $('#'+res2+mov_id).attr("disabled", true);
                $('.title-delete-area').html('Move Picture From '+ mov_name);
                $("#move_all_pic").attr("click_type","move");
                $("#move_all_pic").attr("new_pic_id",pic_id);
            });
            //get all album
            $.ajax({
                url: '../selectalbum',
                type: 'GET',
                data: { id: '1' },
                success: function(response)
                { 
                    var parent =$('.select-album');
                    var f_text = "<option value='' disabled selected>Select Album</option>" ;
                    var child= $(f_text);
                    parent.append(child);
                    const res = response['sele'];
                    let index=0;
                    let text ="";
                    while(res[index]){
                        text =res[index];
                        index++;
                        let str = text['name'];
                        let res1 = str.replaceAll(" ", "_");
                        text = "<option id="+res1+text['id']+" value="+text['id']+" >"+text['name']+"("+response['count'][text['id']]+")</option>" ;
                        child= $(text);
                        parent.append(child);
                    }
                    
                }
            });
            //btn to delete album
            $( ".del_album" ).click(function(e) {
                var e_no = $(this).attr('value');
                $("#del_all_pic").attr("value",e_no);
                $("#move_all_pic").attr("value",e_no);
                var e_name = $(this).attr('name');
                var res2 = e_name.replaceAll(" ", "_");
                var e_count = $(this).attr('count');
                e.preventDefault();
                $.ajax({
                    url: '../deletealbum',
                    type: 'GET',
                    data: { id: e_no },
                    success: function(response)
                    {
                        if(response == "delete"){
                            
                            window.location.replace('../album');
                        }else{
                            if(e_count==1){
                                var c_s="picture";
                            }else{
                                var c_s="pictures";
                            }
                            $("#dele_area").css("display", "block");
                            $('.title-delete-area').html('Delete '+ e_name +' album');
                            $('.dis-delete-area').html('we find '+e_count+' '+c_s+' in this album you can delete album and it\'s '+c_s+' or you can move '+c_s+' to other album and delete album');
                            $('#'+res2+e_no).attr("disabled", true);
                        }
                    }
                });
            });
            //btn to delete album with its pictures
            $( "#del_all_pic" ).click(function(e) {
                var e_no = $(this).attr('value');
                e.preventDefault();
                $.ajax({
                    url: '../deletealbumpicture',
                    type: 'GET',
                    data: { id: e_no },
                    success: function(response)
                    {
                        if(response == "delete"){
                            location.reload();
                        }
                    }
                });
            });
            //btn to delete album and move its picture or move any picture
            $( "#move_all_pic" ).click(function(e) {
                var click_type = $(this).attr('click_type');
                e.preventDefault();
                if(click_type=="move"){
                    var pic_id = $(this).attr('new_pic_id');
                    var album_id = $("#select_album_del").val();
                    $.ajax({
                        url: '../movepic',
                        type: 'GET',
                        data: { id:pic_id,new_id:album_id,type:click_type},
                        success: function(response)
                        {
                            if(response == "done"){
                                location.reload();
                            }
                        }
                    });
                }else{
                    click_type = "delete";
                    var e_no = $(this).attr('value');
                    var new_no = $('#select_album_del').val();
                    $.ajax({
                        url: '../movepic',
                        type: 'GET',
                        data: { id:e_no,new_id:new_no,type:click_type},
                        success: function(response)
                        {
                            if(response == "done"){
                                window.location.replace('../album');
                            }
                        }
                    });
                }
            });
            //delete pic
            $( ".del_pic" ).click(function(e) {
                var e_no = $(this).attr('value');
                e.preventDefault();
                $.ajax({
                    url: '../deletepicture',
                    type: 'GET',
                    data: { id: e_no },
                    success: function(response)
                    {
                        if(response == "delete"){
                            location.reload();
                        }
                    }
                });
            });

            //btn to close edit area
            $( "#edit_close" ).click(function() {
                $("#edit_area").css("display", "none");
            });

            //btn to close add area
            $( "#sub_close" ).click(function() {
                $("#add_area").css("display", "none");
            });

            //btn to close delete notification
            $( "#sub_close_del" ).click(function() {
                $("#dele_area").css("display", "none");
            });
            //
            $( ".add-area" ).click(function() {
                $(".add-area").css("display", "none"); 
            });
            $('.out-client-pick-area').click(function(e) {
                e.stopPropagation();
            });
            $('.show-picture').click(function(e) {
                var src = $(this).attr('src');
                var c_href= window.location.href;
                window.location.href=c_href+'/../'+src;
            });
            $('.main-album').click(function(e) {
                var e_no = $(this).attr('main_id');
                console.log(e_no);
                var route = "<?php echo e(route('album.show',['album' => ':id' ])); ?>";
                route = route.replace(':id',e_no);
                window.location.href=route;
            });
        });

    </script>
</html>
<?php /**PATH /home/emru249w7j2m/public_html/pro/resources/views/layout.blade.php ENDPATH**/ ?>