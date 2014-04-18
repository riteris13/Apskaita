@extends('layout.core')

<?php $header = trans('header.order.edit'); ?>

@section('content')

    {{ Form::model($order, array('url' => 'order/edit', 'class'=>'form-default')) }}

        <h4>Klientas</h4>
        {{Form::select('daktaras_id', Doctor::all()->lists('fullName', 'id'), $order['daktaras_id'], array('class'=>'form-control')); }}

        <h4>Produktas</h4>
        {{Form::select('produktas_id', Item::lists('pavadinimas', 'id'), $order['produktas_id'], array('class'=>'form-control')); }}

        <h4>Vieneto pardavimo kaina</h4>
        {{Form::text('pir_kaina', $order['pir_kaina'], array('class'=>'form-control', 'type'=>'text')); }}

        <h4>Kiekis</h4>
        {{Form::text('kiekis', $order['kiekis'], array('class'=>'form-control', 'type'=>'text')); }}

        {{Form::macro('date', function($name, $value = null, $options = array()) {
        $input =  '<input type="date" name="' . $name . '" value="' . $value . '"';

        foreach ($options as $key => $value) {
        $input .= ' ' . $key . '="' . $value . '"';
        }

        $input .= '>';

        return $input;
        });}}

        <h4>Užsakymo data</h4>
        {{ Form::date('data', $order['data'], array('class'=>'form-control', 'type'=>'date')) }}
        <br>
        <br>
        {{Form::hidden('id', $order['id']) }}
        {{Form::submit('Atnaujinti', array('class'=>'btn btn-primary')); }}

    {{ Form::close() }}

@stop