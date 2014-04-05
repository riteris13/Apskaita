@extends('layout.core')

@section('content')

{{ Form::model($doctor, array('url' => 'doctor/edit', 'class'=>'form-default')) }}

    <h4>Vardas</h4>
    {{Form::text('vardas', $doctor['vardas'], array('class'=>'form-control', 'type'=>'text')); }}

    <h4>Pavardė</h4>
    {{Form::text('pavarde', $doctor['pavarde'], array('class'=>'form-control', 'type'=>'text')); }}

    <h4>Klinika</h4>
    {{Form::select('klinika_id', Clinic::lists('pavadinimas', 'id'), $doctor['klinika_id'] ); }}

    <h4>Detalės</h4>
    {{Form::textarea('detales',  $doctor['detales'], array('class'=>'form-control', 'type'=>'textarea')); }}

    <h4>Kodėl neperka iš mūsų</h4>
    {{Form::textarea('kodel_neperka',  $doctor['kodel_neperka'], array('class'=>'form-control', 'type'=>'textarea')); }}

    <h4>Kaip pritraukti</h4>
    {{Form::textarea('kaip_pritraukti',  $doctor['kaip_pritraukti'], array('class'=>'form-control', 'type'=>'textarea')); }}

    <h4>Taikoma nuolaida %</h4>
    {{Form::text('nuolaida',  $doctor['nuolaida'], array('class'=>'form-control', 'type'=>'text')); }}

    <h4>Potencialumas %</h4>
    {{Form::text('potencialumas',  $doctor['potencialumas'], array('class'=>'form-control', 'type'=>'text')); }}

    <h4>Įvertinimas</h4>
    {{Form::text('ivertinimas',  $doctor['ivertinimas'], array('class'=>'form-control', 'type'=>'text')); }}
    <br>
    <br>
	{{Form::hidden('id', $doctor['id']) }}	
    {{Form::submit('Atnaujinti', array('class'=>'btn btn-primary')); }}

{{ Form::close() }}

@stop
