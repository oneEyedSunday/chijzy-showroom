@extends('layouts.frontend')

@section('title', ' &mdash; Welcome')

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
		<ul class="cd-hero-slider">
			<li class="selected">                    
                    <div class="cd-full-width">
                        <div class="container-fluid js-tm-page-content" data-page-no="1" data-page-type="gallery">
                            <div class="tm-img-gallery-container">
                                <div class="tm-img-gallery gallery-one">
									<div id="gallery">
										@foreach($images as $image)
										<div class="grid-item">
											<figure class="effect-sadie">
												<img src="tm-img-01-tn.jpg" alt="Image">
												<figcaption>
													<h2 class="tm-figure-title">{{$image->caption}}</h2>
													<p class="tm-figure-description">{{$image->description}}</p>
													<a href="{{ asset('uploads/'. $image->url)}}">View fullscreen</a>
												</figcaption>
											</figure>
										</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
				</li>
		</ul>

		<footer class="tm-footer">
            
            <div class="tm-social-icons-container text-xs-center text-center">
                <a href="#" class="tm-social-link"><i class="fa fa-facebook"></i></a>
                <a href="#" class="tm-social-link"><i class="fa fa-twitter"></i></a>
          </div>
            
            <p class="tm-copyright-text">Copyright &copy; <span class="tm-copyright-year">current year</span> Your Company 
            
             | Design: <a href="www.templatemo.com" target="_parent">Template Mo</a></p>

        </footer>
                    
        

        <!-- Preloader, https://ihatetomatoes.net/create-custom-preloading-screen/ -->
        <div id="loader-wrapper">
            
            <div id="loader"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>

        </div>
	

	{{-- replace with genrated content --}}
	{{-- <div class="container mt-5 mleft-100">
		
	
			<div class="row">
				@forelse($images as $image)
					<div class="card unit col-sm-12 col-md-6 col-lg-3">
		              <img alt="Card image cap" src="{{ asset('uploads/' .$image->url) }}" class="my-photo">
		              <p class="card-text">{{ $image->caption}}</p>
		            </div>
				@empty
					<p>Houston we have a problem, no images here.
					Contact me here and rouse me from sleep facebook.com/david</p>
				@endforelse
			</div>

	       <div class="row">
		       	<div class="col-md-8 offset-md-2 col-sm-12 offset-sm-4 col-lg-12 offset-lg-5">
		       		{!! $images->links() !!}
		       	</div>
	       </div>
	       <div class="row">
	           <div class="col-md-8 offset-md-2">
	             {!! "Page " . $images->currentPage() . " of " .  $images->lastPage() !!}     
	           </div>
	       </div>
	</div> --}}
@endsection

