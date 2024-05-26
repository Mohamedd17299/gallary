@extends('layout')
@section('title','albums')
<?php $phpVar="album" ?>
@section('content')
<div class="main-album-content">
    @foreach($album as $album)
        <div class="out-album">
            <div class="edit-delete" id="navbarDropdown{{ $album['id'] }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa-solid fa-ellipsis-vertical fa-lg" style="color: #000000;"></i></div>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown{{ $album['id'] }}">
                <div class="dropdown-item edit_album" name="{{ $album['name'] }}" value="{{ $album['id'] }}">Edit</div>
                <div class="dropdown-item del_album" name="{{ $album['name'] }}" count="{{ $count[$album['id']] }}" value="{{ $album['id'] }}">Delete</div>
            </div>
            @isset($album->picture->where('id')->last()['discription'])
            <img class="main-picture main-album" title="{{ $album['name'] }}" main_id="{{ $album['id'] }}" width="100%" height="100%" src="public/storage/album/{{ $album->picture->where('id')->last()['discription'] }}">
            @endisset
            @empty($album->picture->where('id')->last()['discription'])
            <img class="main-picture main-album" title="{{ $album['name'] }}" main_id="{{ $album['id'] }}" width="100%" height="100%" src="public/storage/album/empty.jpg">
            @endempty
            <div class="d-flex align-items-start w-100 flex-column">
                <div class="nam-album">Name: {{ $album['name'] }}</div>
                <div class="nam-album">Pictures: {{ $count[$album['id']] }}</div>
            </div>
        </div>
    @endforeach
    
</div>
@endsection