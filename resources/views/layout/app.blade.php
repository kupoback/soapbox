<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	@include('partials.head')
	<body>
	@if (Auth::check())
	@else
	@endif
		<div id="app"></div>
		<script src="{{ mix('js/app.js') }}"></script>
	</body>
</html>
