<div class="well">
	<ul class="lista_sin_estilo">
		@foreach ($input as $value)
		<li><p><span>{{$value['key']}}:</span> {{$value['value']}}</p></li>
		@endforeach
	</ul>
</div>
