<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	@include('partials.head')
	<body>
{{--		<div id="app"></div>--}}
		<div class="main-container" role="document">
			<main class="main" id="main" role="main">
				@include('partials.header')
					@yield('content')
				@include('partials.footer')
			</main>
		</div>
		<script src="{{ mix('js/app.js') }}"></script>
	</body>
</html>
