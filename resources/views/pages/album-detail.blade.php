@extends('layouts.site')

@section('title', '&mdash;  View Album')

@section('stylesheets')
	<link rel="stylesheet" href="{{ asset('css/magnific-popup.css')}}">
@endsection

@section('content')

	<div class="container mt-5">
		<div class="row">
			
				@forelse($media as $m)
					<div class="col-sm-12 col-md-6 col-lg-4 my-3">
						<div class="card">
							<a href="{{ asset('uploads/' . $m->url) }}">
								<img src="{{ asset('uploads/' . $m->url) }}" alt="Media cover" class="card-img-top img-fluid">
							</a>
							
							<div class="card-block">
								<h4 class="card-title">{{$m->caption}}</h4>
								<p class="card-text">
									{{$m->description}}
								</p>
							</div>
						</div>	
					</div>
				@empty

					<p class="lead">
						No media in this album yet.
					</p>

				@endforelse
			
		</div>
	</div>

@endsection


@section('scripts')
	<script>
		$(document).ready(function(){
    		$('.card').magnificPopup({
                    delegate: 'a',
                    type: 'image',
                    gallery:{enabled:true}                
            });
        });
	</script>
		
@endsection