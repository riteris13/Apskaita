@extends('layout.core')

<?php $header = trans('header.order.addItem'); ?>
<?php $submit = trans('table.submit'); ?>
<?php $addMore = trans('table.addMore'); ?>
<?php $close = trans('table.close'); ?>

@section('content')
<script src="/js/addOrderItem.js"></script>

{{ Form::open(array('url' => 'order/add2', 'class'=>'form-default', 'id'=>'addOrderItem')) }}

<h4>{{{trans('table.cat')}}}</h4>
{{Form::select('kategorija_id', array('default' => 'Pasirinkite kategoriją') +
Category::all()->lists('pavadinimas', 'id'), null, array('class'=>'form-control', 'id'=>'category')); }}

<h4>{{{trans('table.item')}}}</h4>
{{Form::select('produktas_id', array('default' => 'Pirmiausia pasirinkite kategoriją'), null,
array('class'=>'form-control', 'id'=>'produktas', 'disabled' => 'true')); }}

<h4>Vieneto kaina</h4>
{{Form::text('kaina', '', array('class'=>'form-control', 'type'=>'text',
'onChange' => "calculatePrice();calculateTotal()", 'id' => 'kaina')); }}

<h4>Nuolaidos %</h4>
{{ Form::radio('nuolaidos', $nuolD, '', array('id' => 'nuolaidaD')) }}
<text for="nuolaidaD" id = "nuolDtext"> Daktarui siūloma nuolaida {{$nuolD}} %</text><br>
{{ Form::radio('nuolaidos', '', '', array('id' => 'nuolaidaP')) }}
<text for="nuolaidaPro" id = "nuolPtext"> Produktui siūloma nuolaida </text><br>

<h4>Produktui taikoma nuolaida %</h4>
{{Form::text('nuolaida', $nuolOrder, array('class'=>'form-control', 'type'=>'text',
'onChange' => "calculatePrice();calculateTotal()", 'id' => 'nuolaida')); }}

<!-- Neredaguojamas laukas -->
<div id="pir_kaina"></div>

{{--
<!-- Redaguojamas laukas
<input type="text"  size = 96%  id="pir_kaina">-->
<h4>Vieneto pardavimo kaina</h4>
{{Form::text('pir_kaina', '', array('class'=>'form-control', 'type'=>'text', 'id'=>'pir_kaina')); }}
--}}

<h4>{{{trans('table.quan')}}}</h4>
{{Form::text('kiekis', '', array('class'=>'form-control', 'type'=>'text','onChange' => "calculateTotal()",
'id' => 'kiekis' )); }}

<div id="bendra_suma"></div>

<br>
{{Form::hidden('uzsakymai_id', $orderID) }}
{{Form::hidden('nuolD', $nuolD) }}
{{Form::submit($submit, array('class'=>'btn btn-primary', 'name' => 'Submit')); }}
&nbsp;
{{Form::submit($addMore, array('class'=>'btn btn-primary', 'name' => 'addMore')); }}
&nbsp;
{{Form::submit($close, array('class'=>'btn btn-primary', 'name' => 'Close',
'onclick' => 'if(!confirm("Ar tikrai norite nutraukti užsakymo pildymą?")){return false;};')); }}
{{ Form::close() }}

<!--
    <button type="button" class="btn btn-primary" id="produktas-btn">Pridėti Produktą</button>
-->
@stop