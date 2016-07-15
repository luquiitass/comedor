@extends('layouts.master_user')

@section('content')
    <h2>Estdos Semanal</h2>
    

    <div>
        <table class="table">
            <tr>
                @foreach($estados->estadosDias() as $key => $value)
                    <td style=" text-align: center; ">
                        {{Form::open(array('url' =>"/estado/$estados->id/update"))}}
                        {{Form::hidden('id_estado',$estados->id)}}
                        {{Form::hidden('dia',$key)}}
                        <h4>{{$key}}</h4>
                        @if($value==0)
                            {{Form::hidden('estado','1')}}
                            <img src="{{asset('/img/no_comida.png')}}" alt="No Anotado">
                        @else
                            {{Form::hidden('estado','0')}}
                            <img src="{{asset('/img/si_comida.png')}}" alt="Si Anotado">
                        @endif
                        {{Form::submit('Modificar',array('class'=> 'btn btn-primary'))}}
                        {{Form::token()}}
                        {{Form::close()}}
                    </td>
                @endforeach
            </tr>
        </table>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        
    </script>
@endsection