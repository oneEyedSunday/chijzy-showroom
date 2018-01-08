@extends('layouts.site')

@section('title', ' &mdash; Front Page')


@section('stylesheets')

	<link rel="stylesheet" href="{{ asset('css/album-landing.css') }}">
	<link rel="stylesheet" href="{{ asset('css/magnific-popup.css')}}">

@endsection

@section('content')

	{{-- replace with genrated content --}}
	<div class="container-fluid mt-5">
		<div class="album text-muted">
			<div class="wrapper">
				<div class="row">
					@forelse($images as $image)
						<div class="card unit col-sm-12 col-md-6 col-lg-3">
							<figure class="effect-sadie">
								<img src="{{asset('uploads/'. $image->url)}}" alt="{{$image->slug}}" class="img-fluid full-width">
								<figcaption>
									<h2 class="tm-figure-title">{{$image->caption}}</h2>
									
									<a href="{{asset('uploads/'. $image->url)}}"><p class="tm-figure-description">{{$image->description}}</p></a>
								</figcaption>
							</figure>
			            </div>
			        @empty
			        	<div class="mt-5">
			        		<p class="lead">
			        			No photos check back later
			        		</p>
			        	</div>
					@endforelse
				</div>
				<div class="text-center mt-2">
		       		{!! $images->links('vendor.pagination.bootstrap-4') !!}
		       	</div>
			</div>
			
		</div> 
	</div>

    <div style="padding:0 20px">
        <h2 style="margin:80px 0 30px">
            <span class="hide-xs hide-sm">Browse designs by tags</span>
        </h2>
        <div class="tags pure-g hover_links">
        	@foreach($tags as $t)
            <h3 class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-3 pure-u-lg-1-4 pure-u-xl-1-5">
            	<a href="/designs/?tag={{$t->name}}">{{$t->name}}</a>
            </h3>
            @endforeach
        </div>
    </div>


@endsection

@section('scripts')
	<script>
		$(document).ready(function(){
    		$('figure').magnificPopup({
                    delegate: 'a',
                    type: 'image',
                    gallery:{enabled:true}                
            });
        });
	</script>
		
@endsection