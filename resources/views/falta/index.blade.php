@extends('layouts.master')

@section('content')
    <h2>Faltas</h2>
    <table class="table table-striped table-bordered">
        <thead>
            <th>Fechas</th>
        </thead>
        <tbody>
            @foreach($faltas as $falta)
            <tr>
                <td>
                {{$falta->fecha}}
                </td>
            </tr>
            @endforeach
        </tbody>
        
    </table>
@endsection
