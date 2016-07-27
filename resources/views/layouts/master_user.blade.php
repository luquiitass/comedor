<!DOCTYPE html>
<html lang="en">

	@section('head')
		@include('layouts.partes.head')
	@show

<body class="container">
	<div style=" position: absolute; top: 0px; right: 0px; left: 0px; z-index: 10;padding: 1px; ">
		<div id="mensaje_superior" role="alert" style=" margin: auto; text-align: center; "></div>
	</div>
	
	@if(isset($user))
			@include('layouts.menu.user')
	@endif

	<div id="content" class="container">
		@yield('content')
	</div>
	
	@include('layouts.partes.scripts')

</body>
</html>