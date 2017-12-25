<!DOCTYPE html>
<html lang="en">
	@include('partials._head')
	@yield('stylesheets')
	<body>
		@include('partials.nav.main')

		@include('partials.nav.manage')

		<div class="container">
			@include('partials._messages')
				@yield('content')
			@include('partials._footer')
		</div>
		@include('partials._javascripts')
		@yield('scripts')
	</body>
</html>