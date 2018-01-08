@extends('layouts.site')

@section('title', '&mdash;  Albums')

@section('stylesheets')
	<style>
		.card{
			min-height: 100%;
		}
	</style>
@endsection

@section('content')

	<div class="container mt-5">
		<div class="row">
			
				@forelse($albums as $album)
					<div class="col-sm-12 col-md-6 col-lg-4 my-3">
						<div class="card">
							<img src="{{ asset('uploads/' . $album->cover_image_url) }}" alt="Album cover" class="card-img-top img-fluid">
							<div class="card-block">
								<a href="{{route('album.single', $album->slug)}}" class="card-link"><h4 class="card-title">{{$album->title}}</h4></a>
								<p class="card-text">
									@if(strlen($album->description) > 0)
										{{$album->description}}
									@else
									 No description
									@endif
								</p>
							</div>
						</div>	
					</div>
				@empty

					<p class="lead">
						No albums, check back later
					</p>

				@endforelse
			
		</div>
	</div>

@endsection