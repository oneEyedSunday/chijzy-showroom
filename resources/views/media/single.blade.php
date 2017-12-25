@extends('layouts.manage')

@section('title', '&mdash; View Media')

@section('stylesheets')

	<link rel="stylesheet" href="/css/manage.css">

@endsection

@section('content')
	<div class="container mt-5 mleft-100">
        {{-- messages come from message partial --}}
            <div class="form-group col-md-6">
                <strong>Caption:</strong>
                <p class="blockquote">{{$media->caption}}</p>
            </div>
            <div class="form-group col-md-6">
            	<strong>Type:</strong>
            	<p>{{$media->type}}</p>
            </div>
            
            <div class="form-group col-md-6">
            	<strong>Tags:</strong>
                @if(count($media->tags))
                    @foreach($media->tags as $tag)
                    
                    {{-- <span class="tag-link"><a href="{{route('tags.show', $tag->id)}}">{{$tag->name}}</a></span> --}}
                    <span class="tag-link">{{$tag->name}}</span>
                    @endforeach
                @else
            	   <p class="blockquote">No tags</p>
                @endif
            </div>
            <div class="form-group col-md-6">
            	<strong>Description:</strong>
                @if($media->description)
                <p>{{ $media->description }}</p>
                @else
                <blockquote class="blockquote">No description</blockquote>
                @endif
            </div>
            <div class="form-group col-md-6">
            	<strong>Public:</strong>&nbsp; {{ $media->visibility ? "Yes" : "No" }}
            </div>
            <div class="form-group col-md-6">
            	<strong>Album:</strong>
                @if($media->album)
            	<p>
                    <a href="{{ route('album.single.show', [$media->album->id]) }}">{{$media->album->title}}</a>
                </p>
                @else
                    <p>Doesn't belong to any album</p>
                @endif
            </div>
            <div class="form-group col-md-6">
                @if($media->type == "video")
                <video src="{{  asset('uploads/' .$media->url) }}" autoplay="false" class="display-img img img-reponsive"></video>
                @else 
                <img src="{{ asset('uploads/'. $media->url) }}" alt="Error with file" class="display-img img img-reponsive">
                @endif
            </div>
            <div class="col-md-6">
                <a href="{{ route('media.single.edit', [$media->id]) }}" class="btn btn-success">Edit</a>
            </div>

    </form> 
	</div>
	

@endsection