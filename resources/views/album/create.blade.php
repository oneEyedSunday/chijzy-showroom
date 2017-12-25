@extends('layouts.manage')

@section('title', '&mdash; Add Album')

@section('stylesheets')

	<link rel="stylesheet" href="/css/manage.css">
	<link rel="stylesheet" href="/css/select2.min.css">
@endsection

@section('content')

	<div class="container mt-5 mleft-100">
		<h1>Create Album</h1>
		<form action="{{route('album.add.post')}}" class="form" method="POST" enctype="multipart/form-data">{{ csrf_field() }}
				
				<div class="form-group col-md-6">
                	<label for="title">Title:</label>
                	<input type="text" id="title" name="title" class="form-control" placeholder="Title" maxlength="255">
            	</div>
            	<div class="form-group col-md-6">
	            	<label for="description">Description:</label>
	            	<textarea name="description" id="description" class="form-control" rows="10"></textarea>
	            </div>
	            <div class="form-group col-md-6">
	                <label for="cover_image_url">Cover Photo:</label>
	                <input type="file" id="cover_image_url" name="cover_image_url" class="form-control">
	            </div>
	            <div class="form-group col-md-6">
	            	<label for="tags">Tags:</label>
	            	<select name="tags[]" id="tags" class="form-control select2-multi" multiple>
	                    @foreach($tags as $t)
	            		  <option value="{{$t->id}}">{{$t->name}}</option>
	                    @endforeach
	            	</select>
	            </div>
            	<div class="col-md-6">
                	<button type="submit" class="btn btn-block btn-success">Create Album</button>
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