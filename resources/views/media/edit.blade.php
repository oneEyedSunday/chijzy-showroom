@extends('layouts.manage')

@section('title', '&mdash; Edit Media')

@section('stylesheets')

	<link rel="stylesheet" href="/css/manage.css">
    <link rel="stylesheet" href="/css/select2.min.css">
@endsection

@section('content')
    @if($media->id)
        <div class="container mt-5 " id="force-left">
                <h1 class="text-center">Edit Media</h1>
                 <form action="{{route('media.single.update', [$media->id])}}" class="form" method="POST" enctype="multipart/form-data">

                {{ csrf_field() }} {{ method_field('PUT')}}
                {{-- messages come from message partial --}}
                    <div class="form-group row">
                        <strong>Caption:</strong>
                        <input type="text" name="caption" class="form-control" placeholder="Title" maxlength="255" value="{{$media->caption}}">
                    </div>
                    <div class="form-group row">
                        <label for="slug">Url Slug:</label>
                        <input type="text" name="slug" id="slug" class="form-control" placeholder="Url Slug" required minlength="5" maxlength="191" value="{{$media->slug}}"> 
                    </div>
                    <div class="form-group row">
                        <label for="category">Category:</label>
                        <select name="category" id="category" class="form-control" value="{{$media->category}}" required>
                            <option value="designs" selected= "{{ $media->category == 'designs' ? 'true' : 'false' }}">Designs</option>
                            <option value="photos" selected= "{{ $media->category == 'photos' ? 'true' : 'false' }}">Photos</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <div class="col offset-lg-1 offset-sm-0 offset-md-1">
                            <img src="{{ asset('uploads/'. $media->url) }}" alt="Error with file" class="img img-reponsive display-img">
                        </div>
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
                        <textarea name="description" id="description" class="form-control" rows="10">{{$media->description}}</textarea>
                    </div>
                    <div class="form-group row">
                        <strong>Public:</strong>
                        <label for="" class="inline-label">No &nbsp;<input type="radio" value="0" name="visibility" {{$media->visibility ? "" : "checked"}} class="form-check-inline mr-2"></label>
                        <label for="">Yes &nbsp;<input type="radio" value="1" name="visibility"{{$media->visibility ? "checked" : ""}} class="form-check-inline"></label>
                    </div>
                    <div class="form-group row">
                        <strong>Album:</strong>
                        <select name="album" id="" class="form-control" value="{{$media->album ? $media->album->id : ''}}">
                            <option value="">--Remove from album--</option>
                            @foreach($albums as $a)
                                <option value="{{ $a->id }}" selected="{{ $media->album ? ($a->id == $media->album->id) ? "true" : "false" : 'false'}}">{{ $a->title }}</option>
                            @endforeach
                        </select>
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
    $('.select2-multi').select2().val({!! json_encode($media->tags()->allRelatedIds()) !!}).trigger("change");
  </script>

@endsection