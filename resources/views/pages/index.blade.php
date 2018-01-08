@extends('layouts.site')

@section('title', ' &mdash; Front Page')


@section('stylesheets')

	<link rel="stylesheet" href="{{ asset('css/album-landing.css')}}">
	<link rel="stylesheet" href="{{ asset('css/magnific-popup.css')}}">

@endsection

@section('content')

	<div id="myCarousel" class="carousel slide mb-0" data-ride="carousel">
	  <ol class="carousel-indicators">
	  	@foreach($cdata as $c)
	    <li data-target="#myCarousel" data-slide-to="{{$loop->iteration - 1}}" class="@if($c->position == "1") {{"active"}} @endif"></li>
	    @endforeach
	  </ol>
	  <div class="carousel-inner" role="listbox">
	  	@foreach($cdata as $c)
			<div class="carousel-item @if($c->position == "1") {{"active"}} @endif "  >
		      <img class="first-slide" src="{{ $c->img_src}}" alt="{{ $c->img_alt }}">
		      <div class="container">
		        <div class="carousel-caption d-none d-md-block text-left">
		          <h1>{{ $c->heading }}</h1>
		          <p>{{ $c->text_body }}</p>
		          <p><a class="btn btn-lg btn-primary" href="{{ $c->link_ref }}" role="button">{{ $c->link_text }}</a></p>
		        </div>
		      </div>
		    </div>
	  	@endforeach
	  </div>
	  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>
	

	{{-- replace with genrated content --}}
	<div class="container-fluid">
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
						<p>Houston we have a problem, no images here.
						Contact me here and rouse me from sleep facebook.com/david</p>
					@endforelse
				</div>
				<div class="text-center mt-2">
		       		{!! $images->links('vendor.pagination.bootstrap-4') !!}
		       	</div>
			</div>	
		</div> 
	</div>
	<section>
    	<div class="row">
    		<div class="col-lg-6 col-md-6 col-sm sort">
    			<span>Browse photos by tag</span>
    			@foreach($tags as $t)
	            <h3 class="">
	            	<a href="/photos/?tag={{$t->name}}">{{$t->name}}</a>
	            </h3>
	            @endforeach
    		</div>
    		<div class="col-lg-4 col-md-6 col-sm sort">
    			<span>Browse designs by tag</span>
    			@foreach($tags as $t)
	            <h3 class="">
	            	<a href="/designs/?tag={{$t->name}}">{{$t->name}}</a>
	            </h3>
	            @endforeach
    		</div>
    	</div>
	</section>
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