<!DOCTYPE html>
<html lang="en">

	@section('head')
		@include('layouts.partes.head')
	@show

	<body>
		<div class="container">
			<div id="mensaje_superior">
			</div>
			
			@if(isset($user))
					@include('layouts.menu.user')
			@endif

			@yield('content')
		</div>
	</body>

	@include('layouts.partes.scripts')

</html>