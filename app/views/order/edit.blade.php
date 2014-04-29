@extends('layout.core')

<?php $header = trans('header.order.edit'); ?>

@section('content')

    {{ Form::model(array ($order), array('url' => 'order/edit', 'class'=>'form-default')) }}

        <h4>Klientas</h4>
        {{Form::select('daktaras_id', Doctor::all()->lists('fullName', 'id'), $order['daktaras_id'], array('class'=>'form-control')); }}

        @foreach($order->orders as $item)
        <h4>Produktas</h4>
        {{ Form::select('produktas_id', Item::lists('pavadinimas', 'id'), $item['produktas_id'], array('class'=>'form-control')); }}

        <h4>Vieneto pardavimo kaina</h4>
        {{ Form::text('pir_kaina', $item['pir_kaina'], array('class'=>'form-control', 'type'=>'text')); }}

        <h4>Kiekis</h4>
        {{ Form::text('kiekis', $item['kiekis'], array('class'=>'form-control', 'type'=>'text')); }}
        @endforeach

        <h4>Užsakymo data</h4>
        {{ Form::text('data', $order['data'] , array('class'=>'date', 'type'=>'text')) }}
        <script>
            $(".date").dateinput({
                format: 'yyyy-mm-dd'
            });
        </script>
        <br>
        <br>
        {{Form::hidden('id', $order['id']) }}
        {{Form::submit('Atnaujinti', array('class'=>'btn btn-primary')); }}

    {{ Form::close() }}

@stop