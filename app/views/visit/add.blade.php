@extends('layout.core')

<?php $header = trans('header.visit.add'); ?>

@section('content')
<script type="text/javascript" src="/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="/js/apsilankymai.js"></script>

    {{ Form::open(array('url' => 'visit/add', 'class'=>'form-default')) }}

        <h4>Klinika</h4>
        {{Form::select('klinika_id', array('default' => 'Pasirinkite Kliniką') + Clinic::all()->lists('pavadinimas', 'id'),
        null, array('class'=>'form-control', 'id'=>'klinika')); }}

        <h4>Klientas</h4>
        {{Form::select('daktaras_id', array('default' => 'Pirmiausia pasirinkite kliniką'), null,
        array('class'=>'form-control', 'id'=>'daktaras', 'disabled' => 'true')); }}

        <h4>Tikslas</h4>
        {{Form::text('tikslas', '', array('class'=>'form-control', 'type'=>'text')); }}

        <h4>Pokalbis</h4>
        {{Form::textarea('pokalbis', '', array('class'=>'form-control', 'type'=>'textarea')); }}

        <h4>Kompetitoriai</h4>
        {{Form::textarea('kompetitoriai', '', array('class'=>'form-control', 'type'=>'textarea')); }}

        {{Form::macro('date', function($name, $value = null, $options = array()) {
            $input =  '<input type="date" name="' . $name . '" value="' . $value . '"';

            foreach ($options as $key => $value) {
                $input .= ' ' . $key . '="' . $value . '"';
            }

            $input .= '>';

            return $input;
        });}}

        <h4>Apsilankymo data</h4>
        {{ Form::date('data', '', array('class'=>'form-control', 'type'=>'date')) }}
        <br>
        {{Form::submit('Pridėti', array('class'=>'btn btn-primary')); }}

    {{ Form::close() }}

@stop
