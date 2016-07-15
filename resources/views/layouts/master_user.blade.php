<!DOCTYPE html>
<html lang="en">

	@section('head')
		@include('layouts.partes.head')
	@show

<body class="container">
	
	@if(isset($user))
			@include('layouts.menu.user')
	@endif

	<div class="container">
		@yield('content')
	</div>
	

	@section('scripts')
	    @include('layouts.partes.scripts')
	@show

</body>
</html>