@extends('layout.core')

<?php $header = trans('header.clinic.edit'); ?>

@section('content')

{{ Form::model($clinic, array('url' => 'clinic/edit', 'class'=>'form-default')) }}

    <h4>{{{trans('table.name')}}}</h4>
    {{Form::text('pavadinimas', $clinic['pavadinimas'], array('class'=>'form-control', 'type'=>'text')); }}

    <h4>{{{trans('table.adr')}}}</h4>
    {{Form::text('adresas', $clinic['adresas'], array('class'=>'form-control', 'type'=>'text')); }}

    <h4>{{{trans('table.comCode')}}}</h4>
    {{Form::text('kodas', $clinic['kodas'], array('class'=>'form-control', 'type'=>'text')); }}

    <h4>{{{trans('table.pvm')}}}</h4>
    {{Form::checkbox('vat'); }}
    <br>
    <br>
    {{ Form::hidden('id', $clinic['id']) }}

    {{Form::submit(trans('table.updBtn'), array('class'=>'btn btn-primary')); }}

{{ Form::close() }}

@stop
