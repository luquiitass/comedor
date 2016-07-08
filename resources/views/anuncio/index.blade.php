@extends('layouts.master')

@section('content')
    <h2>Anuncios</h2>
    <ul>
    @foreach($anuncios as $anuncio)
        <li>{{$anuncio->titulo}}</li>
    @endforeach
    </ul>
@endsection