    <div class="container">
        <h2 class="Heading--Fancy">
                <span class="Heading--Fancy__subtitle"></span>
                <span>Estados Semanal</span>
        </h2>
        <div class="row well fondo">
            <div class="col-lg-1"></div>
                    @foreach(\Auth::user()->estadosSemanal->estadosDias() as $key => $value)
                        <div class="col-lg-2 center-block " style=" text-align: center; float: left; ">
                            {{Form::open(array('url'=>'/ver_estados','class'=>'formAjax ','method'=>'get'))}}
                            {{Form::hidden('id_estado',\Auth::user()->estadosSemanal->id)}}
                            {{Form::hidden('dia',$key)}}
                            <h4>{{$key}}</h4>
                            @if($value==0)
                                {{Form::hidden('estado','1')}}
                                <img src="{{asset(public_path().'/img/no_comida.png')}}" alt="No Anotado">
                            @else
                                {{Form::hidden('estado','0')}}
                                <img src="{{asset(public_path().'/img/si_comida.png')}}" alt="Si Anotado">
                            @endif
                            {{Form::button('Modificar', ['type' => 'submit', 'class' => 'btn btn-primary center-block'] )}}
                            {{Form::token()}}
                            {{Form::close()}}
                        </div>
                    @endforeach
            <div class="col-lg-1"></div>
        </div>
    </div>