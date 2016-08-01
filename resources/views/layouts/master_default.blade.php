<!DOCTYPE html>
<html lang="en">

	@section('head')
		@include('layouts.partes.head')
	@show

<body class="container">
	<div id="mensaje_superior">
	</div>
	
	<div id="content" class="container">
		@yield('content')
	</div>
	
	@include('layouts.partes.scripts')

</body>
</html>