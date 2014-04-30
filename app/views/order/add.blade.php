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

        <h4>Kategorija</h4>
        {{Form::select('kategorija_id', array('default' => 'Pasirinkite kategoriją') +
                    Category::all()->lists('pavadinimas', 'id'), null, array('class'=>'form-control', 'id'=>'category')); }}

        <h4>Produktas</h4>
        {{Form::select('produktas_id', array('default' => 'Pirmiausia pasirinkite kategoriją'), null,
                    array('class'=>'form-control', 'id'=>'produktas', 'disabled' => 'true')); }}

        <h4>Vieneto kaina</h4>
        {{Form::text('kaina', '', array('class'=>'form-control', 'type'=>'text',
                    'onChange' => "calculatePrice();calculateTotal()", 'id' => 'kaina')); }}

        <h4>Nuolaidos %</h4>
        {{ Form::radio('nuolaidos', '', '', array('id' => 'nuolaidaD')) }}
        <text for="nuolaidaD" id = "nuolDtext"> Daktarui </text><br>
        {{ Form::radio('nuolaidos', '', '', array('id' => 'nuolaidaP')) }}
        <text for="nuolaidaPro" id = "nuolPtext"> Produktui </text><br>

        <h4>Užsakymui taikoma nuolaida %</h4>
        {{Form::text('nuolaida', '', array('class'=>'form-control', 'type'=>'text',
                    'onChange' => "calculatePrice();calculateTotal()", 'id' => 'nuolaida')); }}

        <!-- Neredaguojamas laukas -->
        <div id="pir_kaina"></div>

        {{--
        <!-- Redaguojamas laukas
        <input type="text"  size = 96%  id="pir_kaina">-->
        <h4>Vieneto pardavimo kaina</h4>
        {{Form::text('pir_kaina', '', array('class'=>'form-control', 'type'=>'text', 'id'=>'pir_kaina')); }}
        --}}

        <h4>Kiekis</h4>
        {{Form::text('kiekis', '', array('class'=>'form-control', 'type'=>'text','onChange' => "calculateTotal()",
                    'id' => 'kiekis' )); }}

        <div id="bendra_suma"></div>

        <h4>Užsakymo data</h4>
        {{ Form::text('data', '' , array('class'=>'date', 'type'=>'text')) }}
        <script>
            $(".date").dateinput({
                format: 'yyyy-mm-dd'
            });
        </script>

        <br>

        {{Form::submit('Pridėti', array('class'=>'btn btn-primary')); }}
    {{ Form::close() }}

@stop