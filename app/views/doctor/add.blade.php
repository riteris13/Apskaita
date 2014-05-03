@extends('layout.core')

<?php $header = trans('header.doctor.add'); ?>

@section('content')

{{ Form::open(array('url' => 'doctor/add', 'class'=>'form-default')) }}

    <h4>Vardas</h4>
    {{Form::text('vardas', '', array('class'=>'form-control', 'type'=>'text')); }}

    <h4>Pavardė</h4>
    {{Form::text('pavarde', '', array('class'=>'form-control', 'type'=>'text')); }}

    <h4>{{{trans('table.clinic')}}}</h4>
    {{Form::select('klinika_id', Clinic::lists('pavadinimas', 'id'), null, array('class'=>'form-control')); }}

    <h4>Detalės</h4>
    {{Form::textarea('detales', '', array('class'=>'form-control', 'type'=>'textarea')); }}

    <h4>Kodėl neperka iš mūsų</h4>
    {{Form::textarea('kodel_neperka', '', array('class'=>'form-control', 'type'=>'textarea')); }}

    <h4>Kaip pritraukti</h4>
    {{Form::textarea('kaip_pritraukti', '', array('class'=>'form-control', 'type'=>'textarea')); }}

    <h4>Taikoma nuolaida %</h4>
    {{Form::text('nuolaida', '', array('class'=>'form-control', 'type'=>'text')); }}

    <h4>{{{trans('table.pot')}}}</h4>
    {{Form::text('potencialumas', '', array('class'=>'form-control', 'type'=>'text')); }}

    <h4>{{{trans('table.score')}}}</h4>
    {{Form::text('ivertinimas', '', array('class'=>'form-control', 'type'=>'text')); }}
    <br>
    <br>
    {{Form::submit('Pridėti', array('class'=>'btn btn-primary')); }}

{{ Form::close() }}

@stop
