<!DOCTYPE html>
<html lang="en">

	@section('head')
		@include('layouts.partes.head')
	@show

	<body class="Frame">
		<header class="Row">
			<div id="mensaje_superior"></div>
			@include('layouts.menu.user')
		</header>

		<section class="Row Expand">
			@yield('content')
		</section>
		

		<footer class="Row">
			@include('layouts.partes.footer')
			@include('layouts.partes.scripts')
		</footer>
	</body>

</html>