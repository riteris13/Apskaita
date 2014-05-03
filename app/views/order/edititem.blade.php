@extends('layout.core')

<?php $header = trans('header.order.edit'); ?>

@section('content')

<script src="/js/jquery.tools.min.js"></script>

{{ Form::model($order, array('url' => 'order/edititem', 'class'=>'form-default')) }}

{{Form::hidden('id', $order['id']) }}
<h4>Produktas</h4>
{{ Form::select('produktas_id', Item::lists('pavadinimas', 'id'), $order['produktas_id'], array('class'=>'form-control')); }}

<h4>Vieneto pardavimo kaina</h4>
{{ Form::text('pir_kaina', $order['pir_kaina'], array('class'=>'form-control', 'type'=>'text')); }}

<h4>Kiekis</h4>
{{ Form::text('kiekis', $order['kiekis'], array('class'=>'form-control', 'type'=>'text')); }}


<br>
{{Form::submit('Atnaujinti', array('class'=>'btn btn-primary', 'name' => 'Submit')); }}
&nbsp;
{{Form::submit('Baigti neatnaujinus', array('class'=>'btn btn-primary', 'name' => 'Close',
'onclick' => 'if(!confirm("Ar tikrai norite baigti neišsaugant pakeitimų?")){return false;};')); }}
{{ Form::close() }}

@stop