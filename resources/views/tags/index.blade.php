@extends('layouts.manage')

@section('title', '&mdash;  All Tags')

@section('stylesheets')

  <link rel="stylesheet" href="/css/manage.css">

@endsection

@section('content')

<div class="container mt-5 " id="force-left">
      <h1 class="text-center">Manage Tags</h1>
      <div class="row">
        <div class="col-sm-12 col-md-12  col-lg-9 ">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
              </tr>
            </thead>
            <tbody>
              @forelse($tags as $tag)
              <tr>
                <th>{{$loop->iteration}}</th>
                <td><a href="{{ route('tags.show', $tag->id) }}">{{$tag->name}}</a></td>
              </tr>
              @empty
                <p class="lead">
                  No tags yet, create some below.
                </p>
              @endforelse
            </tbody>
          </table>
        </div>

        <div class="col-md-12 col-sm-12 col-lg-3 ">
          <div class="well">
            <form action="{{route('tags.create')}}" method="POST" class="form">
              {!! csrf_field() !!} 
              <h2>New tag</h2>
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name">
              <input type="submit" class="btn btn-primary btn-h1-spacing" value="Create New Tag">
            </form>
        </div>
      </div>
</div>


@endsection
