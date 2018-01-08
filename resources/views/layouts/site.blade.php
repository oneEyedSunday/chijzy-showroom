<!DOCTYPE html>
<html lang="en">
	@include('partials._head')
	@yield('stylesheets')
	<body>
		@include('partials.nav.main')

		<div class="container-fluid mt-3">
			@include('partials._messages')
				@yield('content')
			@include('partials._footer')
		</div>
		@include('partials._javascripts')
		@yield('scripts')
	</body>
</html>