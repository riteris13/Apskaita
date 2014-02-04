@extends('layout.core')

@section('content')

    @foreach($items as $item)
        <h6>{{{ $item->pavadinimas}}} <a href="/category/remove/{{$item->id}}">X</a></h6>
    @endforeach

    <a href="/category/add" class="btn btn-primary" >Pridėti</a>

@stop