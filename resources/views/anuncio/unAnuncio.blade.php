<div class="alert-message alert-message-success">
    <h4>{{$anuncio->titulo}}<span class="pull-right text-muted anuncio_hasta">visible hasta {{$anuncio->getFechaHasta()}}</span></h4>
    <p>{{$anuncio->cuerpo}}</p>
   	<strong class="clearfix">{{$anuncio->apellido}} {{$anuncio->nombre}}<small class="pull-right">{{$anuncio->getFechaCreado()}}</small></strong>    
</div>