@extends('layout.core')

<?php $header = trans('header.item.select'); ?>
@section('content')
<script src="/js/addOrder.js"></script>

{{ Form::open(array('url' => 'report/selectdoctor', 'class'=>'form-default')) }}

<h4>{{{trans('table.clinic')}}}</h4>
{{Form::select('klinika_id', array('default' => 'Pasirinkite Kliniką') + Clinic::all()->lists('pavadinimas', 'id'),
null, array('class'=>'form-control', 'id'=>'klinika')); }}

<h4>{{{trans('table.client')}}}</h4>
{{Form::select('daktaras_id', array('default' => 'Pirmiausia pasirinkite kliniką'), null,
array('class'=>'form-control', 'id'=>'daktaras', 'disabled' => 'true')); }}

<h4>{{{trans('table.laik')}}}</h4>
{{Form::select('laikotarpis', array('0' => trans('table.men0'), '1' => trans('table.men1'), '3' => trans('table.men3'),
            '6' => trans('table.men6'), '12' => trans('table.men12')),  null, array('class'=>'form-control')); }}

<br>
{{Form::submit(trans('table.sel'), array('class'=>'btn btn-primary')); }}
{{ Form::close() }}

@stop