@extends('layout.core')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Klientų sąrašas</div>
        <ul class="list-group">
        @foreach($doctors as $doctor)
            <li class="list-group-item"> {{{ $doctor->vardas }}}, {{{ $doctor->pavarde }}}, {{{ $doctor->clinic->pavadinimas }}}</li>
        @endforeach
        </ul>
    </div>
@stop