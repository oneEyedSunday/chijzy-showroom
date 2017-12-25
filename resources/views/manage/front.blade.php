@extends('layouts.manage')

@section('title', '&mdash; Manage Front end')

@section('stylesheets')

	<link rel="stylesheet" href="/css/manage.css">

	<style>
		.balance-out{
			width: 100%;
			max-height: 440px; 
		}
	</style>

@endsection

@section('content')
	<div class="container mt-5 mleft-100">
		@foreach($currentCarousel as $c)
		<div class="card">
			<img src="{{asset($c["img_src"])}}" alt="{{$c["img_alt"]}}" class="card-img-top balance-out">
			<div class="card-block">
				<h1 class="card-title text-center">Carousel Image {{$c["index"]}}</h1>
				<form action="" class="form col-lg-12">
					
					<div class="form-group col-lg-8 offset-lg-2">
						<label for="img_src" class="inline-label">Location of image:</label>
						<input type="text" id="img_src" placeholder="Src of image" class="form-control form-text" value="{{$c["img_src"] }}">
					</div>
					<div class="form-group col-lg-8 offset-lg-2">
						<input type="text" placeholder="Heading" class="form-control" value="{{ $c["heading"]}}">
					</div>
					<div class="form-group col-lg-8 offset-lg-2">
						<input type="text" placeholder="Text" class="form-control" value="{{$c["text_body"]}}">
					</div>
					<div class="form-group col-lg-8 offset-lg-2">
						<input type="text" placeholder="Link" class="form-control" value="{{$c["link_text"]}}">
					</div>
					<div class="form-group col-lg-8 offset-lg-2">
						<input type="text" placeholder="Where does link go" class="form-control" value="{{$c["link_ref"]}}">
					</div>
				</form>
			</div>		
		</div>
		@endforeach

		<div class="card">
			<div class="card-top">
				<h1 class="card-title">
					Privacy Policy
				</h1>
			</div>
			<div class="card-body">
				<p class="card-text">
					{{$privacy}}
				</p>
			</div>
		</div>

		<div class="card">
			<div class="card-top">
				<h1 class="card-title">
					Terms of Use
				</h1>
			</div>
			<div class="card-body">
				<p class="card-text">
					{{$tos}}
				</p>
			</div>
		</div>

		<div>
			<p class="lead">
				Ok, so this is what i'm gonna do.
				I'd have to save carousel in db.
				and all front end stuff in db
				so i can reset them and all.
				so, first of all list how the front end looks like at this point
				then an option to change it (will be showned by default)
				hiidden with javascript
				but, im worried about the load of querying the db everytime the page loads.
				caching in essemce
				i think thi that laravel caches templates so that'd help
				so in development i'd save as array
				would or mignt not move the front end data to the db
			</p>
		</div>
	</div>
@endsection

@section('scripts')

	<script></script>

@endsection