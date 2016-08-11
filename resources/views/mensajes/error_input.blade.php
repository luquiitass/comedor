@if($errors->has($name))
	<ul>
	@foreach($errors->get($name) as $er)
		<li style=" color: #b10c06; ">{{$er}}</li>
	@endforeach
	</ul>
@endif