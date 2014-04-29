@extends('layout.core')
@section('content')

{{ Form::open(array('url' => '/auth/add', 'class'=>'form-signin')) }}

    <h2>Naujo vartotojo pridėjimas</h2>
    <br>
    {{Form::text('email', '', array('type'=>'text', 'class'=>'form-control'))}}

    <br>
    <h4>Naujo vartotojo rolė</h4>
    <p><b>Direktorius </b>{{ Form::radio('role', 'direktore'); }}</p>
    <p><b>Atstovas </b>{{ Form::radio('role', 'atstovas'); }}</p>
    <br>

    {{Form::submit('Sukurti',array('class'=>'btn btn-lg btn-primary btn-block')); }}

    {{ Form::hidden('first-login', '1') }}

{{ Form::close() }}

@stop