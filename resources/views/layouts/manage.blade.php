<!DOCTYPE html>
<html lang="en">
	@include('partials._head')
	@yield('stylesheets')
	<body>
		@include('partials.nav.main')

		<div class="container">
			@include('partials._messages')
				@yield('content')
				@include('partials.nav.manage')
		</div>
		@include('partials._javascripts')
		@yield('scripts')
	</body>
</html>