<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	@include('partials.head')
	<body>
		{{-- The Vue App Component --}}
		<div id="app" data-app-name="{{ config('app.name', 'Laravel') }}"></div>
		<script src="{{ mix('js/app.js') }}"></script>
	</body>
</html>
