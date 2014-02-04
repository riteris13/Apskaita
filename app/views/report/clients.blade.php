@extends('layout.core')

@section('content')

@foreach($doctors as $doctor)
<h6>{{{ $doctor->vardas }}}, {{{ $doctor->pavarde }}}, {{{ $doctor->clinic->pavadinimas }}}</h6>
@endforeach

@stop