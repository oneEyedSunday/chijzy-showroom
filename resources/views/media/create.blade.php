@extends('layouts.manage')

@section('title', '&mdash; Add Media')

@section('stylesheets')

	<link rel="stylesheet" href="/css/manage.css">
    <link rel="stylesheet" href="/css/select2.min.css">

@endsection

@section('content')
	<div class="container mt-5" id="force-left">
		<h1 class="text-center">Add Media</h1>
		 <form action="{{route('media.add.post')}}" class="form" method="POST" enctype="multipart/form-data">

        {{ csrf_field() }}
            <div class="form-group row">
                <label for="caption">Caption:</label>
                <input type="text" id="caption" name="caption" class="form-control" placeholder="Title" maxlength="191" required>
            </div>
            
            <div class="form-group row">
                <label for="slug">Url Slug:</label>
                <input type="text" name="slug" id="slug" class="form-control" placeholder="Url Slug" required minlength="5" maxlength="191">
            </div>
            <div class="form-group row">
                <label for="category">Category:</label>
                <select name="category" id="category" class="form-control"  required>
                    <option value="">--Select a category--</option>
                    <option value="designs">Designs</option>
                    <option value="photos">Photos</option>
                </select>
            </div>
            <div class="form-group row">
                <label for="media">Media:</label>
                <input type="file" id="media" name="media" class="form-control form-control-file" accept="image/*" required >
            </div>
            <div class="form-group row">
            	<label for="tags">Tags: &nbsp;</label>
            	<select name="tags[]" id="tags" class="form-control select2-multi" multiple>
                    @foreach($tags as $t)
            		  <option value="{{$t->id}}">{{$t->name}}</option>
                    @endforeach
            	</select>
            </div>
            <div class="form-group row">
            	<label for="description">Description:</label>
            	<textarea name="description" id="description" class="form-control" rows="10"></textarea>
            </div>
            <div class="form-group row">
            	<strong class="mr-5">Public:</strong>
            	<label for="" class="inline-label">No &nbsp;<input type="radio" value="0" name="visibility" class="form-check-inline mr-2"></label>
            	<label for="" class="inline-label">Yes &nbsp;<input type="radio" value="1" name="visibility"  class="form-check-inline" checked></label>
            </div>
            <div class="form-group row">
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
            <div class="row">
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