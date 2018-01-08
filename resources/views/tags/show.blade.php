@extends('layouts.manage')

@section('title', "| $tag->name Tag")

@section('stylesheets')

  <link rel="stylesheet" href="/css/manage.css">

@endsection

@section('content')
  <div class="container mt-5" id="force-left">
    <div class="row">
      <div class="col-md-8">
        <h1>{{$tag->name}} tag <p><small>{{$tag->media()->count()}} Media</small></p> <p><small>{{ $tag->albums()->count()}} Album(s)</small></p></h1>
      </div>
      <div class="col-md-2">
        <a href="{{route('tags.edit', $tag->id)}}" class="btn btn-primary pull-right btn-block btn-h1-spacing">Edit</a>
      </div>
      <div class="col-md-2">
        <form action="{{route('tags.delete', $tag->id)}}" class="form" method="POST">
          {!! csrf_field() !!} {!! method_field('DELETE') !!}
          <input type="submit" value="Delete" class="btn btn-danger btn-block btn-h1-spacing">
        </form>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($tag->media as $m)
              <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $m->caption}}</td>
                <td><a href="{{ route('media.single.show', $m->id) }}" class="btn btn-default btn-xs">View</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($tag->albums as $a)
              <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $a->title}}</td>
                <td><a href="{{ route('album.single.show', $a->id) }}" class="btn btn-default btn-xs">View</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@stop
