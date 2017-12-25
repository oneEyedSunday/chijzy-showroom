@extends('layouts.site')

@section('title', ' &mdash; Front Page')


@section('stylesheets')

	<link rel="stylesheet" href="css/album-landing.css">

@endsection

@section('content')

	<div id="myCarousel" class="carousel slide mt-5" data-ride="carousel">
	  <ol class="carousel-indicators">
	    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	    <li data-target="#myCarousel" data-slide-to="1"></li>
	    <li data-target="#myCarousel" data-slide-to="2"></li>
	  </ol>
	  <div class="carousel-inner" role="listbox">
	  	@foreach($cdata as $c)
			<div class="carousel-item @if($c["index"] == "1") {{"active"}} @endif "  >
		      <img class="first-slide" src="{{ $c["img_src"]}}" alt="{{ $c["img_alt"] }}">
		      <div class="container">
		        <div class="carousel-caption d-none d-md-block text-left">
		          <h1>{{ $c["heading"] }}</h1>
		          <p>{{ $c["text_body"] }}</p>
		          <p><a class="btn btn-lg btn-primary" href="{{ $c["link_ref"] }}" role="button">{{ $c["link_text"] }}</a></p>
		        </div>
		      </div>
		    </div>
	  	@endforeach
	    {{-- <div class="carousel-item active">
	      <img class="first-slide" src="{{ $cdata[0]["img_src"]}}" alt="{{ $cdata[0]["img_alt"] }}">
	      <div class="container">
	        <div class="carousel-caption d-none d-md-block text-left">
	          <h1>Hey there.</h1>
	          <p>Hello i'm David Iloba, a graphic designer and photographer.Welcome to my homepage, while you're around, please feel free to browse the images and share my links to your friends.</p>
	          <p><a class="btn btn-lg btn-primary" href="#" role="button">Contact Me.</a></p>
	        </div>
	      </div>
	    </div> --}}
	    {{-- <div class="carousel-item">
	      <img class="second-slide" src="images/carousel/drone-bg.jpg" alt="Second slide">
	      <div class="container">
	        <div class="carousel-caption d-none d-md-block">
	          <h1>Another example headline.</h1>
	          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
	          <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
	        </div>
	      </div>
	    </div>
	    <div class="carousel-item">
	      <img class="third-slide" src="images/carousel/girl-bg.jpg" alt="Third slide">
	      <div class="container">
	        <div class="carousel-caption d-none d-md-block text-right">
	          <h1>One more for good measure.</h1>
	          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
	          <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
	        </div>
	      </div>
	    </div> --}}
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
		</div>

		<div class="text-center">
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
      	</div>
	</div>

	<div style="text-align:center;max-width:1024px;margin:auto;padding:100px 20px 10px">
            <h2>Free images and videos you can use anywhere</h2>
            <p style="margin:0 0 35px">
                Pixabay is a vibrant community of creatives, sharing copyright free images and videos. All contents are released under Creative Commons CC0, which makes them safe to use without asking for permission or giving credit to the artist - even for commercial purposes.
                <a href="/en/service/faq/" style="white-space:nowrap">Learn more...</a>
            </p>
            <p style="margin:0 0 25px">
                <a class="hover_opacity" style="margin-right:10px" href="//play.google.com/store/apps/details?id=com.pixabay.pixabayapp" target="_blank"><img style="display:inline" src="/static/img/app_badge_google.png" alt="Google Play Store" width="151" height="45"></a>
                <a class="hover_opacity" href="//itunes.apple.com/app/id1178021455" target="_blank"><img style="display:inline" src="/static/img/app_badge_apple.png" alt="Apple App Store" width="151" height="45"></a>
            </p>
        </div>

        <div style="padding:0 20px">
            <h2 style="margin:80px 0 30px">
                <span class="hide-xs hide-sm">Browse pictures by category</span>
                <span class="hide-md hide-lg hide-xl">Browse by  albums category</span>
            </h2>
            <div class="tags pure-g hover_links">
            	@foreach($tags as $t)
                <h3 class="pure-u-1 pure-u-sm-1-2 pure-u-md-1-3 pure-u-lg-1-4 pure-u-xl-1-5">
                	<a href="/photos/?tag={{$t->name}}">{{$t->name}}</a>
                </h3>
                @endforeach
            </div>
        </div>


@endsection