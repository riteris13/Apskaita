@extends('layout.core')

@section('content')

{{ Form::open(array('url' => 'visit/add', 'class'=>'form-default')) }}

    <h4>Tikslas</h4>
    {{Form::text('tikslas', '', array('class'=>'form-control', 'type'=>'text')); }}

    <h4>Pokalbis</h4>
    {{Form::text('pokalbis', '', array('class'=>'form-control', 'type'=>'text')); }}

    <h4>Kompetitoriai</h4>
    {{Form::text('kompetitoriai', '', array('class'=>'form-control', 'type'=>'text')); }}

    {{Form::submit('Pridėti', array('class'=>'btn btn-primary')); }}

{{ Form::close() }}

@stop
