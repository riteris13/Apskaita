@extends('layout.core')

@section('content')

{{ Form::model($doctor, array('url' => 'doctor/edit', 'class'=>'form-default')) }}

    <h4>Vardas</h4>
    {{Form::text('vardas', $doctor['vardas'], array('class'=>'form-control', 'type'=>'text')); }}

    <h4>Pavardė</h4>
    {{Form::text('pavarde', $doctor['pavarde'], array('class'=>'form-control', 'type'=>'text')); }}

    <h4>Klinika</h4>
    {{Form::select('klinika_id', Clinic::lists('pavadinimas', 'id'), $doctor['klinika_id'] ); }}
    <br>
    <br>
	{{Form::hidden('id', $doctor['id']) }}	
    {{Form::submit('Atnaujinti', array('class'=>'btn btn-primary')); }}

{{ Form::close() }}

@stop
