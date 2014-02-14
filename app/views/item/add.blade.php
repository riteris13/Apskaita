@extends('layout.core')

@section('content')

{{ Form::open(array('url' => 'item/add', 'class'=>'form-default')) }}

    <h4>Kategorija</h4>
    {{Form::select('kategorija_id', Category::lists('pavadinimas', 'id')); }}

    <h4>Pavadinimas</h4>
    {{Form::text('pavadinimas', '', array('class'=>'form-control', 'type'=>'text')); }}

    <h4>Kodas</h4>
    {{Form::text('kodas', '', array('class'=>'form-control', 'type'=>'text')); }}

    <h4>Kaina</h4>
    {{Form::text('kaina', '', array('class'=>'form-control', 'type'=>'text')); }}
    <br>
    <br>
    {{Form::submit('Pridėti', array('class'=>'btn btn-primary')); }}

{{ Form::close() }}

@stop



