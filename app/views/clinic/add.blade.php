@extends('layout.core')

@section('content')

{{ Form::open(array('url' => 'clinic/add')) }}

{{Form::text('pavadinimas'); }}
{{Form::text('adresas'); }}
{{Form::checkbox('vat'); }}
{{Form::submit('Pridėti'); }}

{{ Form::close() }}

@stop
