@extends('layout')
@section('title','albums')
<?php $phpVar="show" ?>

@section('content')
<div class="main-album-content">
    <div class="d-flex flex-column w-100" >
        <div class="d-flex align-items-center w-100 main-album-show">
            <div class="d-flex justify-content-start" style="padding-right: 20px; width:70%;">
                <div class="d-flex flex-column justify-content-center  align-items-center w-50" style="padding: 0px 12px;">
                    <label for="">Album name</label>
                    <div class="nam-album">{{ $album['name'] }}</div>
                </div>
                <div class="d-flex flex-column justify-content-center  align-items-center w-50" style="padding: 0px 12px;">
                    <label for="">picture Count</label>
                    <div class="num-album">{{ $count[$album['id']] }}</div>
                </div>
            </div>
            <div class="d-flex justify-content-end" style="padding-right: 30px; width:30%;">
                <div>
                    <button type="submit" style="margin:0px 5px;"  name="{{ $album['name'] }}" value="{{ $album['id'] }}" class="btn btn-outline-success btn-sm edit_album">Edit</button>
                </div>
                <div>
                    <button type="submit" style="margin:0px 5px;" name="{{ $album['name'] }}" count="{{ $count[$album['id']] }}" value="{{ $album['id'] }}" class="del_album btn btn-outline-danger btn-sm">Delete</button>
                </div>
            </div>
        </div>

        <div>
        <div class="main-album-content">
            @foreach($album->picture as $picture)
                <div class="out-album">
                    <div class="edit-delete" id="navbarDropdown{{ $picture['id'] }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical fa-lg" style="color: #000000;"></i></div>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown{{ $picture['id'] }}">
                        <div class="dropdown-item move_pic" album_name="{{ $picture->album->name }}" value="{{ $picture['id'] }}" album_id="{{ $picture->album->id }}">Move</div>
                        <div class="dropdown-item edit_pic" name="{{ $picture['name'] }}" value="{{ $picture['id'] }}">Edit</div>
                        <div class="dropdown-item del_pic" value="{{ $picture['id'] }}">Delete</div>
                    </div>
                    @isset($picture->discription)
                    <img title="{{ $picture->name }}" class="main-picture show-picture" width="100%" height="100%" src="../public/storage/album/{{ $picture->discription }}">
                    @endisset
                    @empty($picture->discription)
                    <img title="{{ $picture->name }}" class="main-picture show-picture" width="100%" height="100%" src="../public/storage/album/{{ $picture->discription }}">
                    @endempty
                    <div class="d-flex align-items-start w-100 flex-column">
                        <div class="nam-album" style="height:50px;">Name: {{ $picture->name }}</div>
                    </div>
                </div>
            @endforeach
        </div>
        </div>
    </div>
</div>
@endsection