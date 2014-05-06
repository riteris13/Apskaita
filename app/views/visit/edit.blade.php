@extends('layout.core')

<?php $header = trans('header.visit.edit'); ?>

@section('content')

<script src="/js/jquery.tools.min.js"></script>

    {{ Form::model($visit, array('url' => 'visit/edit', 'class'=>'form-default')) }}

        <h4>{{{trans('table.client')}}}</h4>
        {{Form::select('daktaras_id', Doctor::all()->lists('fullName', 'id'), $visit['daktaras_id'], array('class'=>'form-control')); }}

        <h4>{{{trans('table.purp')}}}</h4>
        {{Form::text('tikslas', $visit['tikslas'], array('class'=>'form-control', 'type'=>'text')); }}

        <h4>{{{trans('table.pok')}}}</h4>
        {{Form::textarea('pokalbis', $visit['pokalbis'], array('class'=>'form-control', 'type'=>'textarea')); }}

        <h4>{{{trans('table.komp')}}}</h4>
        {{Form::textarea('kompetitoriai', $visit['kompetitoriai'], array('class'=>'form-control', 'type'=>'textarea')); }}

        <h4>{{{trans('table.date')}}}</h4>
        {{ Form::text('data', $visit['data'], array('class'=>'date', 'type'=>'text')) }}
            <script>
                $(".date").dateinput({
                    format: 'yyyy-mm-dd'
                });
            </script>
        {{Form::hidden('id', $visit['id']) }}
        <br>
        {{Form::submit(trans('table.updBtn'), array('class'=>'btn btn-primary')); }}

    {{ Form::close() }}

@stop
