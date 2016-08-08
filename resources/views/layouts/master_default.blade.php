<!DOCTYPE html>
<html lang="en">

	@section('head')
		@include('layouts.partes.head')
	@show

<body>
	<div class="container">
		<div id="mensaje_superior">
		@yield('content')
	</div>
	
	
	@include('layouts.partes.scripts')

</body>
</html>