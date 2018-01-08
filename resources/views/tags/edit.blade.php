@extends('layouts.manage')

@section('title', '&mdash;  Edit Tag')

@section('stylesheets')

  <link rel="stylesheet" href="/css/manage.css">

@endsection

@section('content')

<div class="container mt-5" id="force-left">
      <div class="col offset">
      	<form action="{{route('tags.update', $tag->id)}}" class="form" method="POST">
	      {!! csrf_field() !!}
	      <h2>Edit tag</h2>
	      <div class="form-group col">
		      <label for="name">Name:</label>
		      <input type="text" class="form-control" name="name" value='{{$tag->name}}'>
		      <input type="submit" class="btn btn-success btn-h1-spacing" value="Save Changes">
		  </div>
      
       </form>
      </div>
@stop
