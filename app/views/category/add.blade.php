@extends('layout.core')

@section('content')

{{ Form::open(array('url' => 'category/add')) }}

{{Form::text('pavadinimas'); }}
{{Form::submit('Pridėti'); }}

{{ Form::close() }}

@stop
