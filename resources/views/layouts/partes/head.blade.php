<head>
	<meta charset="UTF-8">

	<title> @yield('titulo','Titulo no definido pap')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="{{asset(public_path().'css/estilos.css')}}">
	
    <link href="{{asset(public_path().'css/bootstrap.css')}}" rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">

    <link rel="stylesheet" href="{{asset(public_path().'datePicker/css/bootstrap-datepicker3.css')}}">
    <link rel="stylesheet" href="{{asset(public_path().'datePicker/css/bootstrap-datepicker.standalone.css')}}">

    @section('styles')

    @show
    
</head>