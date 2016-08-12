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

			<div class="modal modal-static fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		        <div class='AjaxisModal'>
			        <div class="modal-dialog " style=" width: 200px; ">
	    				<div class="modal-content">
	    					<div class="modal-body">
	      						<p class="text-center"><i class="fa fa-spinner fa-pulse fa-5x fa-fw"></i></p>
	      						<h3 class="text-center">Cargando</h3>
	      					</div>
	   					</div>
	  				</div>
	  			</div>
		    </div>
		</div>
	</body>

	@include('layouts.partes.scripts')

</html>