@extends('layouts.manage')

@section('title', '&mdash; Manage Front end')

@section('stylesheets')

	<link rel="stylesheet" href="/css/manage.css">

	<style>
		.balance-out{
			width: 100%;
			max-height: 400px; 
		}
	</style>

@endsection

@section('content')
	<div class="container mt-5" id="force-left">

		<form action="{{ route('manage.set.frontend') }}" class="form" method="POST">
								{!! csrf_field() !!}
		@foreach($currentCarousel as $c)
			<div class="row">
				<div class="col-lg col-md col sm">
					<div class="card mt-5 mb-5">
						@if($c->img_src)<img src="{{asset($c->img_src)}}" alt="Not found" class="card-img-top img img-responsive display-img">@endif
						<div class="card-title text-center">
							<h1>Carousel item</h1>
						</div>
						<div>		
							<div class="form-group row">
								<label for="img_src" class="col-2 col-form-label offset-1">Location of image:</label>
								<div class="col-8">
									<input type="text" id="img_src" name="{{'img_src' . $loop->iteration }}" placeholder="Src of image" class="form-control form-text" value="{{$c->img_src}}">
								</div>
							</div>
							<div class="form-group row">
								<label for="position" class="col-2 col-form-label offset-1">Position of image:</label>
								<div class="col-8">
									<input type="number" id="position" name="{{'position' . $loop->iteration }}" placeholder="Position of image in carousel" class="form-control" value="{{ $c->position}}">
								</div>					
							</div>
							<div class="form-group row">
								<label for="heading" class="col-2 col-form-label offset-1">Heading of text:</label>
								<div class="col-8">
									<input type="text" placeholder="Heading"  id="heading" name="{{'heading' . $loop->iteration }}" class="form-control" value="{{$c->heading}}">
								</div>		
							</div>
							<div class="form-group row">
								<label for="text" class="col-2 col-form-label offset-1">Text body:</label>
								<div class="col-8">
									<input type="text" placeholder="Text" id="text" class="form-control" name="{{'text' . $loop->iteration }}" value="{{$c->text_body}}">
								</div>	
							</div>
							<div class="form-group row">
								<label for="link_text" class="col-2 col-form-label offset-1">Text of link:</label>
								<div class="col-8">
									<input type="text" id="link_text" placeholder="Link" class="form-control" name="{{'link_text' . $loop->iteration }}" value="{{$c->link_text}}">
								</div>	
							</div>
							<div class="form-group row">
								<label for="link_ref" class="col-2 col-form-label offset-1">Target of link:</label>
								<div class="col-8">
									<input type="text" id="link_ref" placeholder="Target of Link" class="form-control" name="{{'link_ref' . $loop->iteration }}" value="{{$c->link_ref}}">
								</div>	
							</div>
							<div class="form-group row">
									<div class="col-2 offset-1">
										Switch on:
									</div>
									
										<label for="" class="ml-2">Yes: <input type="radio" name="{{'state' . $loop->iteration }}" {{$c->visible ? "checked" : ""}} value="1"></label>
										<label for="" class="ml-2">No: <input type="radio" name="{{'state' . $loop->iteration }}" {{$c->visible ? "" : "checked"}} value="0"></label>
									
								</div>
							</div>		
						</div>
					</div>
				</div>

		@endforeach

		<div class="row">
			<div class="col-lg-8 offset-lg-2">
				<input type="submit" value="Update carousel" class="btn btn-success mb-2">
			</div>
		</div>
		</form>
		
	</div>
@endsection

@section('scripts')

	<script></script>

@endsection