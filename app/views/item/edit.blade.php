@extends('layout.core')

<?php $header = trans('header.item.edit'); ?>

@section('content')

    {{ Form::model($item, array('url' => 'item/edit', 'class'=>'form-default')) }}

        <h3>Produktas priklauso kategorijai "{{{Category::where('id', '=', $item->kategorija_id)->first()->pavadinimas}}}"</h3>
        {{Form::text('id', $item->id, array('class'=>'form-control hidden', 'type'=>'text')); }}

        <h4>Pavadinimas</h4>
        {{Form::text('pavadinimas', $item->pavadinimas, array('class'=>'form-control', 'type'=>'text')); }}

        <h4>Kodas</h4>
        {{Form::text('kodas', $item->kodas, array('class'=>'form-control', 'type'=>'text')); }}

        <h4>Kaina</h4>
        {{Form::text('kaina', $item->kaina, array('class'=>'form-control', 'type'=>'text')); }}

        <h4>Nuolaida %</h4>
        {{Form::text('nuolaida', $item->nuolaida, array('class'=>'form-control', 'type'=>'text')); }}

        @foreach($attributes as $attribute)
        <h4>{{{ucfirst($attribute->atributas)}}}</h4>
        {{Form::text($attribute->atributas, $item->atributas, array('class'=>'form-control', 'type'=>'text')); }}
        @endforeach

        <br>
        {{Form::submit('Atnaujinti', array('class'=>'btn btn-primary')); }}
    {{ Form::close() }}

@stop