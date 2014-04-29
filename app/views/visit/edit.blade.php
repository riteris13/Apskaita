@extends('layout.core')

<?php $header = trans('header.visit.edit'); ?>

@section('content')

    {{ Form::model($visit, array('url' => 'visit/edit', 'class'=>'form-default')) }}

        <h4>Tikslas</h4>
        {{Form::text('tikslas', $visit['tikslas'], array('class'=>'form-control', 'type'=>'text')); }}

        <h4>Pokalbis</h4>
        {{Form::textarea('pokalbis', $visit['pokalbis'], array('class'=>'form-control', 'type'=>'textarea')); }}

        <h4>Kompetitoriai</h4>
        {{Form::textarea('kompetitoriai', $visit['kompetitoriai'], array('class'=>'form-control', 'type'=>'textarea')); }}

        <h4>Apsilankymo data</h4>
        {{ Form::text('data', $visit['data'], array('class'=>'date', 'type'=>'text')) }}
            <script>
                $(".date").dateinput({
                    format: 'yyyy-mm-dd'
                });
            </script>
        {{Form::hidden('id', $visit['id']) }}
        <br>
        {{Form::submit('Atnaujinti', array('class'=>'btn btn-primary')); }}

    {{ Form::close() }}

@stop
