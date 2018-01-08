@extends('layouts.manage')

@section('title', '&mdash; View Media')

@section('stylesheets')

	<link rel="stylesheet" href="/css/manage.css">

@endsection

@section('content')
	<div class="container mt-5" id="force-left">
        {{-- messages come from message partial --}}
            <div class="form-group row">
                <div class="col-2">
                  <strong>Caption:</strong>  
                </div>
                <div class="col-10">
                    <p class="blockquote">{{$media->caption}}</p>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-2">
                    <strong>Url Slug:</strong>
                </div>
                <div class="col-10">
                    <p class="blockquote">{{$media->slug}}</p>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-2">
                    <strong>Category:</strong>
                </div>
                <div class="col-10">
                    <p class="blockquote">{{$media->category}}</p>
                </div>
            </div>
            
            <div class="form-group row">
                <div class="col-2">
                    <strong>Tags:</strong>
                </div>
                <div class="col-10">
                    @if(count($media->tags))
                    @foreach($media->tags as $tag)
                    <span class="tag-link mr-2">{{$tag->name}}</span>
                    @endforeach
                @else
                   <p class="blockquote">No tags</p>
                @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-2">
                    <strong>Description:</strong>
                </div>
            	<div class="col-10">
                    @if($media->description)
                    <p class="lead">{{ $media->description }}</p>
                    @else
                    <blockquote class="blockquote">No description</blockquote>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-2">
                    <strong>Public:</strong>
                </div>
            	<div class="col-10">
                 {{ $media->visibility ? "Yes" : "No" }}   
                </div>
            </div>
            <div class="form-group row">
                <div class="col-2">
                    <strong>Album:</strong>
                </div>
            	<div class="col-10">
                    @if($media->album)
                    <p class="blockquote">
                        <a href="{{ route('album.single.show', [$media->album->id]) }}">{{$media->album->title}}</a>
                    </p>
                    @else
                        <p class="blockquote">Doesn't belong to any album</p>
                    @endif
                </div>
                
            </div>
            <div class="form-group row">
                <div class="col offset-lg-1 offset-sm-0 offset-md-0">
                            <img src="{{ asset('uploads/'. $media->url) }}" alt="Error with file" class="img img-reponsive display-img">
                        </div>
            </div>
            <div class="row">
                <div class="col offset">
                    <a href="{{ route('media.single.edit', [$media->id]) }}" class="btn btn-success">Edit</a>
                </div>
            </div>

    </form> 
	</div>
	

@endsection