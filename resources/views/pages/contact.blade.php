@extends('layouts.site')

@section('title', ' &mdash; Contact Me')


@section('stylesheets')

	<link rel="stylesheet" href="{{ asset('css/album-landing.css') }}">

@endsection

@section('content')
	<div class="container">
		<div class="row mt-5">
          <div class="col ">
            <h1>Contact Me</h1>
            <hr>
            <form action="{{ route('contact.post')}}" method="POST">
            	{{csrf_field() }}
              <div class="form-group">
                <label for="email" name="email">Your Email:</label>
                <input  class="form-control" type="text" name="email" value="" id="email" required>
              </div>

              <div class="form-group">
                <label for="subject" name="subject">Subject:</label>
                <input  class="form-control" type="text" name="subject" value="" id="subject" required >
              </div>

              <div class="form-group">
                <label for="message" name="message">Message:</label>
                <textarea name="message" rows="8" cols="80" name="message" class="form-control" required placeholder="Type your message here..."></textarea>
              </div>
              <input type="submit" class="btn btn-success" value="Send Message">
            </form>
          </div>
        </div>
	</div>
@endsection


@section('scripts')

	<script>
		"use js to handle form submission"
	</script>

@endsection