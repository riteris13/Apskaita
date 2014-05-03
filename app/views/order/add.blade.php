@extends('layout.core')

<?php $header = trans('header.order.add'); ?>

@section('content')

<script src="/js/jquery.tools.min.js"></script>
<script src="/js/addOrder.js"></script>

    {{ Form::open(array('url' => 'order/add', 'class'=>'form-default', 'id'=>'addOrder')) }}

        <h4>Klinika</h4>
        {{Form::select('klinika_id', array('default' => 'Pasirinkite Kliniką') + Clinic::all()->lists('pavadinimas', 'id'),
                    null, array('class'=>'form-control', 'id'=>'klinika')); }}

        <h4>Klientas</h4>
        {{Form::select('daktaras_id', array('default' => 'Pirmiausia pasirinkite kliniką'), null,
                    array('class'=>'form-control', 'id'=>'daktaras', 'disabled' => 'true')); }}

        <h4>Užsakymo data</h4>
        {{ Form::text('data', '' , array('class'=>'date', 'type'=>'text')) }}
        <script>
            $(".date").dateinput({
                format: 'yyyy-mm-dd'
            });
        </script>
<br>
        {{Form::submit('Pridėti ir baigti', array('class'=>'btn btn-primary', 'name' => 'Submit',
            'onclick' => 'if(!confirm("Ar tikrai norite sukurti tuščią užsakymą?")){return false;};')); }}
        &nbsp;
        {{Form::submit('Pridėti produktų', array('class'=>'btn btn-primary', 'name' => 'addMore')); }}
        &nbsp;
        {{Form::submit('Baigti', array('class'=>'btn btn-primary', 'name' => 'Close',
        'onclick' => 'if(!confirm("Ar tikrai norite nutraukti užsakymo sukūrimą?")){return false;};')); }}
    {{ Form::close() }}

@stop