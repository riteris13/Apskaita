@extends('layout.core')

<?php $header = trans('header.order.addItem'); ?>

@section('content')
<script src="/js/addOrderItem.js"></script>

{{ Form::open(array('url' => 'order/add2', 'class'=>'form-default', 'id'=>'addOrderItem')) }}

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
{{ Form::radio('nuolaidos', $nuolD, '', array('id' => 'nuolaidaD')) }}
<text for="nuolaidaD" id = "nuolDtext"> Daktarui siūloma nuolaida {{$nuolD}} %</text><br>
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

<br>
{{Form::hidden('uzsakymai_id', $orderID) }}
{{Form::hidden('nuolD', $nuolD) }}
{{Form::submit('Pridėti ir baigti', array('class'=>'btn btn-primary', 'name' => 'Submit')); }}
&nbsp;
{{Form::submit('Pridėti', array('class'=>'btn btn-primary', 'name' => 'addMore')); }}
&nbsp;
{{Form::submit('Baigti', array('class'=>'btn btn-primary', 'name' => 'Close',
'onclick' => 'if(!confirm("Ar tikrai norite nutraukti užsakymo pildymą?")){return false;};')); }}
{{ Form::close() }}

<!--
    <button type="button" class="btn btn-primary" id="produktas-btn">Pridėti Produktą</button>
-->
@stop