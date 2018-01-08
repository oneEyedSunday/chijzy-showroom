@extends('layouts.manage')

@section('title', '&mdash; View Album')

@section('stylesheets')

	<link rel="stylesheet" href="/css/manage.css">

@endsection

@section('content')

	<div class="container mt-5" id="force-left">
		<h1 class="text-center">Album: {{ $album->title }}</h1>
				
		<div class="form-group row">
            <div class="col-2">
                  <strong>Title:</strong>  
                </div>
                <div class="col-10">
                    <p class="blockquote">{{$album->title}}</p>
                </div>
    	</div>
        <div class="form-group row">
            <div class="col-2">
                <strong>Url Slug:</strong>
            </div>
            <div class="col-10">
                <p class="blockquote">{{$album->slug}}</p>
            </div> 
        </div>
    	<div class="form-group row">
            <div class="col-2">
              <strong>Description:</strong> 
            </div>
        	<div class="col-10">
                <p class="blockquote">{{ $album->description }}</p>
            </div>
            
        </div>
        <div class="form-group row">
            <img src="{{ asset('uploads/'. $album->cover_image_url) }}" alt="Error with file" class="display-img img-responsive">
        </div>
    	{{-- links to
    	existing media and link to album
    	upload media and set album to this
    	display tags --}}
    	<div class="row">
    		<div class="col-sm-8 col-sm-offset-2">
    			<p class="lead">To add media to this album</p>
	    		<ul>
	    			<li>Go to the media listing page <a href="{{ route('media.all') }}">here</a> and link a media item to this album. Or</li>
	    			<li><a href="{{ route('media.add', [$album->id]) }}">Upload</a> media to this album directly.</li>
	    		</ul>
    		</div>
    		
    	</div>
         <div class="form-group row mt-2">
            <div class="col-2">
                <strong>Tags:</strong>
            </div>

            <div class="col-10">
                @if(count($album->tags))
                    @foreach($album->tags as $a)
                    
                    {{-- <span class="label label-default"><a href="{{route('tags.show', $a->id)}}"></a>{{$a->name}}</span> --}}
                    <span class="tag-link mr-2">{{$a->name}}</span>

                    @endforeach              
                @else
                <p class="blockquote">No tags</p>
                @endif
            </div>
        </div>
		{{-- album media listing --}}
    	<div class="row">
    		<div class="col-sm-8 col-sm-offset-2">
    			<p class="lead">Media belonging to this Album</p>
				<ul>
    			@forelse($album->media as $m)
					
		    			<li><a href="{{ route('media.single.show', [$m->id]) }}">{{$m->caption}}</a></li>
		    		
    			@empty
					<p class="lead">No media in this album yet, add <a href="{{ route('media.all') }}">here</a></p>
    			@endforelse
    			</ul>
    		</div>
    		
    	</div>
    	
	</div>

@endsection