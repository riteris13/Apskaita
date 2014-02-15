@extends('layout.core')

@section('content')

{{ Form::model($visit, array('url' => 'visit/edit', 'class'=>'form-default')) }}

    <h4>Tikslas</h4>
    {{Form::text('tikslas', $visit['tikslas'], array('class'=>'form-control', 'type'=>'text')); }}

    <h4>Pokalbis</h4>
    {{Form::text('pokalbis', $visit['pokalbis'], array('class'=>'form-control', 'type'=>'text')); }}

    <h4>Kompetitoriai</h4>
    {{Form::text('kompetitoriai', $visit['kompetitoriai'], array('class'=>'form-control', 'type'=>'text')); }}

	{{Form::hidden('id', $visit['id']) }}
    {{Form::submit('Atnaujinti', array('class'=>'btn btn-primary')); }}

{{ Form::close() }}

@stop
