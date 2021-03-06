@extends('layout.core')

<?php $header = trans('header.visit.add'); ?>


@section('content')

<script src="/js/jquery.tools.min.js"></script>
<script src="/js/addVisit.js"></script>

    {{ Form::open(array('url' => 'visit/add', 'class'=>'form-default')) }}

        <h4>{{{trans('table.clinic')}}}</h4>
        {{Form::select('klinika_id', array('default' => 'Pasirinkite Kliniką') + Clinic::all()->lists('pavadinimas', 'id'),
        null, array('class'=>'form-control', 'id'=>'klinika')); }}

        <h4>{{{trans('table.doc')}}}</h4>
        {{Form::select('daktaras_id', array('default' => 'Pirmiausia pasirinkite kliniką'), null,
        array('class'=>'form-control', 'id'=>'daktaras', 'disabled' => 'true')); }}

        <h4>{{{trans('table.purp')}}}</h4>
        {{Form::text('tikslas', '', array('class'=>'form-control', 'type'=>'text')); }}

        <h4>{{{trans('table.pok')}}}</h4>
        {{Form::textarea('pokalbis', '', array('class'=>'form-control', 'type'=>'textarea')); }}

        <h4>{{{trans('table.komp')}}}</h4>
        {{Form::textarea('kompetitoriai', '', array('class'=>'form-control', 'type'=>'textarea')); }}

        <h4>{{{trans('table.date')}}}</h4>
        {{ Form::text('data', '' , array('class'=>'date', 'type'=>'text')) }}
        <script>
            $(".date").dateinput({
                format: 'yyyy-mm-dd'
            });
        </script>
        <br>
        {{Form::submit(trans('table.addBtn'), array('class'=>'btn btn-primary')); }}

    {{ Form::close() }}

@stop
