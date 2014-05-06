@extends('layout.core')

<?php $header = trans('header.item.add'); ?>

@section('content')

    {{ Form::open(array($id, 'url' => 'item/add', 'class'=>'form-default')) }}

        <h3>{{{trans('table.newProCat')}}} {{{Category::where('id', '=', $id)->first()->pavadinimas}}} :</h3>
        <br>
        {{Form::text('kategorija_id', $id, array('class'=>'form-control hidden', 'type'=>'text')); }}

        <h4>{{{trans('table.name')}}}</h4>
        {{Form::text('pavadinimas', '', array('class'=>'form-control', 'type'=>'text')); }}

        <h4>{{{trans('table.code')}}}</h4>
        {{Form::text('kodas', '', array('class'=>'form-control', 'type'=>'text')); }}

        <h4>{{{trans('table.price')}}}</h4>
        {{Form::text('kaina', '', array('class'=>'form-control', 'type'=>'text')); }}

        <h4>{{{trans('table.discount')}}}</h4>
        {{Form::text('nuolaida', '', array('class'=>'form-control', 'type'=>'text')); }}

        @foreach($attributes as $attribute)
            <h4>{{{ucfirst($attribute->atributas)}}}</h4>
            {{Form::text($attribute->atributas, '', array('class'=>'form-control', 'type'=>'text')); }}
        @endforeach
        <br>
        {{Form::submit(trans('table.add'), array('class'=>'btn btn-primary')); }}
    {{ Form::close() }}



@stop