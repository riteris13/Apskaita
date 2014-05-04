@extends('layout.core')

<?php $header = trans('header.category.add'); ?>
<?php $btn = trans('table.addBtn'); ?>

@section('content')

{{ Form::open(array('url' => 'category/add', 'class'=>'form-default')) }}

    <h4>{{{trans('table.catName')}}}</h4>
        {{Form::text('pavadinimas', '', array('class'=>'form-control', 'type'=>'text')); }}

    <h4>{{{trans('table.selAtr')}}}</h4>
    {{{trans('table.sys')}}}
    {{Form::checkbox('sistema'); }}
    <br>
    {{{trans('table.slo')}}}
    {{Form::checkbox('slotas'); }}
    <br>
    {{{trans('table.kabl')}}}
    {{Form::checkbox('kabliukai'); }}
    <br>
    {{{trans('table.side')}}}
    {{Form::checkbox('puse'); }}
    <br>
    {{{trans('table.jaw')}}}
    {{Form::checkbox('zandikaulis'); }}
    <br>
    {{{trans('table.tor')}}}
    {{Form::checkbox('sukimas'); }}
    <br>
    {{{trans('table.rot')}}}
    {{Form::checkbox('rotacija'); }}
    <br>
    {{{trans('table.size')}}}
    {{Form::checkbox('dydis'); }}
    <br>
    {{{trans('table.ani')}}}
    {{Form::checkbox('zverelis'); }}
    <br>
    {{{trans('table.col')}}}
    {{Form::checkbox('spalva'); }}
    <br>
    <br>
    {{Form::submit($btn, array('class'=>'btn btn-primary')); }}
{{ Form::close() }}

@stop
