@extends('layout.core')

@section('content')

@foreach($items as $item)
<h6>{{{ $item->id}}} {{{ $item->pavadinimas}}} {{{ $item->kodas}}} {{{ $item->category->pavadinimas}}}</h6>
@endforeach

@stop