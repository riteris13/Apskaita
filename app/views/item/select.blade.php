@extends('layout.core')

<?php $header = trans('header.item.select'); ?>

@section('content')

    {{ Form::open(array('url' => 'item/select', 'class'=>'form-default')) }}

        <h4>{{{trans('table.selCat')}}}</h4>
        {{Form::select('kategorija_id', Category::lists('pavadinimas', 'id'), null, array('class'=>'form-control')); }}
        <br>
        {{Form::submit(trans('table.sel'), array('class'=>'btn btn-primary')); }}
    {{ Form::close() }}

@stop