<!DOCTYPE html>
<html lang="en">
	@include('partials.frontend.head')
	<body>
		@include('partials.frontend.nav')

		<div class="container-fluid mt-3">
				@yield('content')
		</div>
		@include('partials.frontend.javascripts')
		
	</body>
</html>