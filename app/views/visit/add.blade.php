@extends('layout.core')

@section('content')

{{ Form::open(array('url' => 'visit/add')) }}

{{Form::text('tikslas'); }}
{{Form::text('pokalbis'); }}
{{Form::text('kompetitoriai'); }}
{{Form::submit('Pridėti'); }}

{{ Form::close() }}

@stop
