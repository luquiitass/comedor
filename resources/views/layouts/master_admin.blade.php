<!DOCTYPE html>
<html lang="en">

	@section('head')
		@include('layouts.partes.head')
	@show

	<body class="Frame">


		<header class="Row">
			<div id="mensaje_superior"></div>
			@include('layouts.menu.admin')
		</header>

		<section class="Row Expand">
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

		</section>
		

		<footer class="Row">
			@include('layouts.partes.footer')
			@include('layouts.partes.scripts')
		</footer>
		

	</body>
</html>