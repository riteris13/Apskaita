@extends('layout.core')

@section('content')

{{ Form::open(array('url' => 'doctor/add')) }}

{{Form::text('vardas'); }}
{{Form::text('pavarde'); }}
{{Form::select('klinika_id', Clinic::lists('pavadinimas', 'id')); }}
{{Form::submit('Pridėti'); }}

{{ Form::close() }}

@stop
