@extends('layout.core')

<?php $header = trans('header.report.selVis'); ?>
@section('content')
<script src="/js/selectVisit.js"></script>

{{ Form::open(array('url' => 'report/selectvisit', 'class'=>'form-default')) }}

<h4>{{{trans('table.clinic')}}}</h4>
{{Form::select('klinika_id', array('default' => 'Pasirinkite Kliniką') + Clinic::all()->lists('pavadinimas', 'id'),
null, array('class'=>'form-control', 'id'=>'klinika')); }}

<h4>{{{trans('table.client')}}}</h4>
{{Form::select('daktaras_id', array('default' => 'Pirmiausia pasirinkite kliniką'), null,
array('class'=>'form-control', 'id'=>'daktaras', 'disabled' => 'true')); }}

<h4>{{{trans('table.visit')}}}</h4>
{{Form::select('vizitas_id', array('default' => 'Pirmiausia pasirinkite gydytoją'), null,
array('class'=>'form-control', 'id'=>'vizitas', 'disabled' => 'true')); }}

<br>
{{Form::submit(trans('table.sel'), array('class'=>'btn btn-primary')); }}
{{ Form::close() }}

@stop