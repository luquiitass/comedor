<!DOCTYPE html>
<html lang="en">

	@section('head')
		@include('layouts.partes.head')
	@show

<body class="container">
	<div id="mensaje_superior">
	</div>
	
	@if(isset($user))
			@include('layouts.menu.admin')
	@endif

	<div class="container">
		@yield('content')
	</div>
	
	@include('layouts.partes.scripts')

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class = 'AjaxisModal'></div>
    </div>

</body>
</html>