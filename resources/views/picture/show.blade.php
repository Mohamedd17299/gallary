@extends('layout')
@section('title','picture')
<?php $phpVar = "picture" ?>

@section('content')
<div class="main-album-content">
    @foreach($picture as $picture)
        <div class="out-album">
            <div class="edit-delete" id="navbarDropdown{{ $picture['id'] }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical fa-lg" style="color: #000000;"></i></div>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown{{ $picture['id'] }}">
                <div class="dropdown-item move_pic" album_name="{{$picture->album->name}}" value="{{ $picture['id'] }}" album_id="{{ $picture->album->id }}">Move</div>
                <div class="dropdown-item edit_pic" name="{{ $picture['name'] }}" value="{{ $picture['id'] }}">Edit</div>
                <div class="dropdown-item del_pic" value="{{ $picture['id'] }}">Delete</div>
            </div>
            @isset($picture->discription)
            <img title="{{ $picture->name }}" class="main-picture show-picture" width="100%" height="100%" src="public/storage/album/{{ $picture->discription }}">
            @endisset
            @empty($picture->discription)
            <img title="{{ $picture->name }}" class="main-picture show-picture" width="100%" height="100%" src="public/storage/album/{{ $picture->discription }}">
            @endempty
            <div class="d-flex align-items-start w-100 flex-column">
                <div class="nam-album">Name: {{ $picture->name }}</div>
                <div class="nam-album">Album: {{ $picture->album->name }}</div>
            </div>
        </div>
    @endforeach
</div>
@endsection