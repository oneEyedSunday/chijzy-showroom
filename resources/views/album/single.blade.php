@extends('layouts.manage')

@section('title', '&mdash; View Album')

@section('stylesheets')

	<link rel="stylesheet" href="/css/manage.css">

@endsection

@section('content')

	<div class="container mt-5 mleft-100">
		<h1>Album: {{ $album->title }}</h1>
				
		<div class="form-group col-md-6">
        	<strong>Title:</strong>
        	<p class="blockquote">{{$album->title}}</p>
    	</div>
    	<div class="form-group col-md-6">
        	<strong>Description:</strong>
            <p class="blockquote">{{ $album->description }}</p>
        </div>
        <div class="form-group col-md-6">
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
         <div class="form-group col-md-6">
                <strong>Tags:</strong>
                @if(count($album->tags))
                    @foreach($album->tags as $a)
                    
                    {{-- <span class="label label-default"><a href="{{route('tags.show', $a->id)}}"></a>{{$a->name}}</span> --}}
                    <span class="tag-link">{{$a->name}}</span>

                    @endforeach              
                @else
                <p>No tags</p>
                @endif
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