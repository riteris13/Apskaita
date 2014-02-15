@extends('layout.core')

@section('content')

{{ Form::open(array('url' => 'item/select', 'class'=>'form-default')) }}
    <h4>Pasirinkite kategoriją</h4>
    {{Form::select('kategorija_id', Category::lists('pavadinimas', 'id')); }}
    {{Form::submit('Pasirinkti', array('class'=>'btn btn-primary')); }}
{{ Form::close() }}

@stop