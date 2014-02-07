@extends('layout.core')

@section('content')

{{ Form::open(array('url' => 'doctor/add')) }}

{{Form::text('vardas'); }}
{{Form::text('pavarde'); }}
{{Form::text('klinika_id'); }}
{{Form::submit('Pridėti'); }}

{{ Form::close() }}

@stop
