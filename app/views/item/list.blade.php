@extends('layout.core')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Produktų sąrašas</div>
        <ul class="list-group">
        @foreach($items as $item)
            <li class="list-group-item"> {{{ $item->category->pavadinimas}}} {{{ $item->pavadinimas}}} {{{ $item->kodas}}} </li>
        @endforeach
        </ul>
    </div>
@stop