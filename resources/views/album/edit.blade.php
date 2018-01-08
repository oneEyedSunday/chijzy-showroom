@extends('layouts.manage')

@section('title', '&mdash; Edit Album')

@section('stylesheets')

	<link rel="stylesheet" href="/css/manage.css">
    <link rel="stylesheet" href="/css/select2.min.css">
@endsection

@section('content')
    @if($album->id)
        <div class="container mt-5" id="force-left">
                <h1 class="text-center">Edit {{ $album->title }}</h1>
                 <form action="{{route('album.single.update', [$album->id])}}" class="form" method="POST" enctype="multipart/form-data">

                {{ csrf_field() }} {{ method_field('PUT')}}
                {{-- messages come from message partial --}}
                    <div class="form-group row">
                        <strong>Title:</strong>
                        <input type="text" name="title" class="form-control" placeholder="Title" maxlength="255" value="{{$album->title}}">
                    </div>
                    <div class="form-group row">
                        <label for="slug">Url Slug:</label>
                        <input type="text" name="slug" id="slug" class="form-control" placeholder="Url Slug" required minlength="5" maxlength="191" value="{{$album->slug}}"> 
                    </div>
                    <div class="form-group row">
                        <div class="col offset-lg-1 offset-sm-0 offset-md-1">
                            <img src="{{ asset('uploads/'. $album->cover_image_url) }}" alt="Error with file" class="img img-reponsive display-img">
                        </div>
                    </div>

                    <div class="form-group row">
                        <strong>Change Cover Photo:</strong>
                        <input type="file" name="cover_image_url" class="form-control">
                    </div>

                    <div class="form-group row">
                        <label for="tags">Tags:</label>
                        <select name="tags[]" id="tags" class="form-control select2-multi" multiple>
                            @foreach($tags as $t)
                              <option value="{{$t->id}}">{{$t->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-group row">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" class="form-control" rows="10">{{$album->description}}</textarea>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-success">Submit Changes</button>
                    </div>

            </form> 
            </div>
    

    @else
        Fuck off this page
    @endif
	
@endsection

@section('scripts')

  <script type="text/javascript" src="/js/select2.full.min.js"></script> 
  <script type="text/javascript">
    $(".select2-multi").select2();
    $('.select2-multi').select2().val({!! json_encode($album->tags()->allRelatedIds()) !!}).trigger("change");
  </script>

@endsection