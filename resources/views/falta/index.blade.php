@extends('layouts.master_user')

@section('content')
    <h2 class="Heading--Fancy">
        <span class="Heading--Fancy__subtitle"></span>
        <span>Faltas</span>
    </h2>
    <div class="row well fondo">
        <div class="col-md-8 col-md-offset-2">
            <ul class="  list-group">
                <?php $meses = $user->obtenerFaltasPorMes();?>
                    
                    @forelse($meses as $nombreMes => $mes)
                    <li class="faltas list-group-item  {{$nombreMes==$mesActual?'verde':''}}">
                        <p class="pull-right">
                            <span class="badge">{{$mes->count()}}</span> 
                            Faltas
                        </p>

                        {{$nombreMes}}
                        <ul class="list-group" hidden="true">
                        @foreach($mes as  $falta)
                            <li class="list-group-item">
                                {{$falta->getFecha()}}
                            </li>
                        @endforeach
                        </ul>
                    </li>
                    @empty
                        <div class="alert alert-info">No posee faltas</div>
                    @endforelse
            </ul>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script type="text/javascript">
        $(function(){
        $('.faltas').click(function() {
            $(this).find('ul').slideToggle();
        });
    });
    </script>
@endsection


