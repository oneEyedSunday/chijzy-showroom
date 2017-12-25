@extends('layouts.manage')

@section('title', '&mdash; Add Media')

@section('stylesheets')

	<link rel="stylesheet" href="/css/manage.css">
    <link rel="stylesheet" href="/css/select2.min.css">

@endsection

@section('content')
	<div class="container mt-5 mleft-100">
		<h1>Add Media</h1>
		 <form action="{{route('media.add.post')}}" class="form" method="POST" enctype="multipart/form-data">

        {{ csrf_field() }}
		
            <div class="form-group col-md-6">
                <label for="caption">Caption:</label>
                <input type="text" id="caption" name="caption" class="form-control" placeholder="Title" maxlength="255">
            </div>
            <div class="form-group col-md-6">
            	<label for="type">Type:</label>
            	<select name="type" id="type" class="form-control">
            		<option value="image" selected>Image</option>
            		<option value="video">Video</option>
            	</select>
            </div>
            <div class="form-group col-md-6">
                <label for="media">Media:</label>
                <input type="file" id="media" name="media" class="form-control">
            </div>
            <div class="form-group col-md-6">
            	<label for="tags">Tags:</label>
            	<select name="tags[]" id="tags" class="form-control select2-multi" multiple>
                    @foreach($tags as $t)
            		  <option value="{{$t->id}}">{{$t->name}}</option>
                    @endforeach
            	</select>
            </div>
            <div class="form-group col-md-6">
            	<label for="description">Description:</label>
            	<textarea name="description" id="description" class="form-control" rows="10"></textarea>
            </div>
            <div class="form-group col-md-6">
            	<strong>Public:</strong>
            	<label for="" class="inline-label">No &nbsp;<input type="radio" value="0" name="visibility"></label>
            	<label for="">Yes &nbsp;<input type="radio" value="1" name="visibility" checked></label>
            </div>
            <div class="form-group col-md-6">
            	<label for="album">Album:</label>
            	<select name="album" id="album" class="form-control" value="{{$selectedalbum ? $selectedalbum->id : ""}}" >
                    @if($selectedalbum)
                        <option value="{{$selectedalbum->id}}">{{$selectedalbum->title}}</option>
                    @else
                        <option value="">--Select an Album--</option>
                        @foreach($albums as $a)
                            <option value="{{$a->id}}">{{ $a->title }}</option>
                        @endforeach
                    @endif
            		
            	</select>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-success">Upload</button>
            </div>

    </form> 
	</div>
	

@endsection

@section('scripts')

  <script type="text/javascript" src="/js/select2.full.min.js"></script> 
  <script type="text/javascript">
    $(".select2-multi").select2();
  </script>

@endsection