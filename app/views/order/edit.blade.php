@extends('layout.core')

<?php $header = trans('header.order.edit'); ?>

@section('content')

<script src="/js/jquery.tools.min.js"></script>

    {{ Form::model($order, array('url' => 'order/edit', 'class'=>'form-default')) }}

        <h4>{{{trans('table.client')}}}</h4>
        {{Form::select('daktaras_id', Doctor::all()->lists('fullName', 'id'), $order['daktaras_id'], array('class'=>'form-control')); }}

        <h4>{{{trans('table.orderDate')}}}</h4>
        {{ Form::text('data', $order['data'] , array('class'=>'date', 'type'=>'text')) }}
        <script>
            $(".date").dateinput({
                format: 'yyyy-mm-dd'
            });
        </script>
        <br>
        <br>
        {{Form::hidden('id', $order['id']) }}
        {{Form::submit('Atnaujinti', array('class'=>'btn btn-primary', 'name' => 'Submit')); }}
        &nbsp;
        {{Form::submit('Baigti neatnaujinus', array('class'=>'btn btn-primary', 'name' => 'Close',
        'onclick' => 'if(!confirm("Ar tikrai norite baigti neišsaugant pakeitimų?")){return false;};')); }}

    {{ Form::close() }}

@stop