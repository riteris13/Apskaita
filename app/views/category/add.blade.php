@extends('layout.core')

@section('content')

{{ Form::open(array('url' => 'category/add', 'class'=>'form-default')) }}
    <h4>Kategorijos pavadinimas</h4>
        {{Form::text('pavadinimas', '', array('class'=>'form-control', 'type'=>'text')); }}
    {{Form::submit('Pridėti', array('class'=>'btn btn-primary')); }}
{{ Form::close() }}

@stop
