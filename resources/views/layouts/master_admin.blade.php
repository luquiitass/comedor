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
					@include('layouts.menu.admin')
			@endif

			@yield('content')

			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		        <div class='AjaxisModal'></div>
		    </div>
		</div>
	</body>

	@include('layouts.partes.scripts')

</html>