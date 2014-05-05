@extends('layout.core')

<?php $header = trans('header.doctor.edit'); ?>

@section('content')

{{ Form::model($doctor, array('url' => 'doctor/edit', 'class'=>'form-default')) }}

    <h4>{{{trans('table.pName')}}}</h4>
    {{Form::text('vardas', $doctor['vardas'], array('class'=>'form-control', 'type'=>'text')); }}

    <h4>{{{trans('table.sName')}}}</h4>
    {{Form::text('pavarde', $doctor['pavarde'], array('class'=>'form-control', 'type'=>'text')); }}

    <h4>{{{trans('table.clinic')}}}</h4>
    {{Form::select('klinika_id', Clinic::lists('pavadinimas', 'id'), $doctor['klinika_id'], array('class'=>'form-control') ); }}

    <h4>{{{trans('table.det')}}}</h4>
    {{Form::textarea('detales',  $doctor['detales'], array('class'=>'form-control', 'type'=>'textarea')); }}

    <h4>Kodėl neperka iš mūsų</h4>
    {{Form::textarea('kodel_neperka',  $doctor['kodel_neperka'], array('class'=>'form-control', 'type'=>'textarea')); }}

    <h4>Kaip pritraukti</h4>
    {{Form::textarea('kaip_pritraukti',  $doctor['kaip_pritraukti'], array('class'=>'form-control', 'type'=>'textarea')); }}

    <h4>{{{trans('table.discount')}}}</h4>
    {{Form::text('nuolaida',  $doctor['nuolaida'], array('class'=>'form-control', 'type'=>'text')); }}

    <h4>{{{trans('table.pot')}}}</h4>
    {{Form::text('potencialumas',  $doctor['potencialumas'], array('class'=>'form-control', 'type'=>'text')); }}

    <h4>{{{trans('table.score')}}}</h4>
    {{Form::text('ivertinimas',  $doctor['ivertinimas'], array('class'=>'form-control', 'type'=>'text')); }}
    <br>
    <br>
	{{Form::hidden('id', $doctor['id']) }}	
    {{Form::submit(trans('table.updBtn'), array('class'=>'btn btn-primary')); }}

{{ Form::close() }}

@stop
