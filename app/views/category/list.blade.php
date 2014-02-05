@extends('layout.core')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Kategorijų sąrašas</div>
        <ul class="list-group">
        @foreach($items as $item)
            <li class="list-group-item">{{{ $item->pavadinimas}}} <a class="btn-sm btn-danger" href="/category/remove/{{$item->id}}">x</a></li>
        @endforeach
        </ul>
    </div>
    <a href="/category/add" class="btn btn-primary" >Pridėti naują</a>

@stop