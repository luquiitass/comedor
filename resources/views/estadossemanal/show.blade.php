@extends('layouts.master_user')
@section('content')
    <h2>Estdos Semanal</h2>
    <div class="row">
        <div class="col-lg-1"></div>
                @foreach($estados->estadosDias() as $key => $value)
                    <div class="col-lg-2 center-block " style=" text-align: center; float: left; ">
                        {{Form::open(array('class'=>'formAjax ','method'=>'get'))}}
                        {{Form::hidden('id_estado',$estados->id)}}
                        {{Form::hidden('dia',$key)}}
                        <h4>{{$key}}</h4>
                        @if($value==0)
                            {{Form::hidden('estado','1')}}
                            <img src="{{asset(public_path().'/img/no_comida.png')}}" alt="No Anotado">
                        @else
                            {{Form::hidden('estado','0')}}
                            <img src="{{asset(public_path().'/img/si_comida.png')}}" alt="Si Anotado">
                        @endif
                        {{Form::submit('Modificar',array('class'=> 'btn btn-primary center-block'))}}
                        {{Form::token()}}
                        {{Form::close()}}
                    </div>
                @endforeach
        <div class="col-lg-1"></div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(function(){
            $('#content').modEstado();
        });
    </script>
@endsection