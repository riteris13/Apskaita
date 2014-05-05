@extends('layout.core')

<?php $header = trans('header.clinic.add'); ?>
<?php $btn = trans('table.addBtn'); ?>

@section('content')

{{ Form::open(array('url' => 'clinic/add', 'class'=>'form-default')) }}

    <h4>{{{trans('table.name')}}}</h4>
    {{Form::text('pavadinimas', '', array('class'=>'form-control', 'type'=>'text')); }}

    <h4>{{{trans('table.adr')}}}</h4>
    {{Form::text('adresas', '', array('class'=>'form-control', 'type'=>'text')); }}

    <h4>{{{trans('table.comCode')}}}</h4>
    {{Form::text('kodas', '', array('class'=>'form-control', 'type'=>'text')); }}

    <h4>{{{trans('table.pvm')}}}</h4>
    {{Form::checkbox('vat'); }}
    <br>
    <br>
    {{Form::submit($btn, array('class'=>'btn btn-primary')); }}

{{ Form::close() }}

@stop
