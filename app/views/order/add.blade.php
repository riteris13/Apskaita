@extends('layout.core')
@section('content')

<script type="text/javascript" src="/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/jScript.js"></script>

{{ Form::open(array('url' => 'order/add', 'class'=>'form-default', 'id'=>'addOrder')) }}
{{ Form::hidden('count', 1) }}

<select id="category" name="category" class="form-control">
    <option>Select Category</option>
    <option value="1">Pirma</option>
    <option value="42">Antra</option>
    <option value="43">Trecia</option>
</select>
<br>
<select id="product" name="product" class="form-control">
    <option>Please choose category first</option>
</select>


<h4>Klientas</h4>
{{Form::select('daktaras_id', Doctor::all()->lists('fullName', 'id'), null, array('class'=>'form-control')); }}

<h4>Produktas</h4>
{{Form::select('produktas_id', Item::lists('pavadinimas', 'id'), null, array('class'=>'form-control')); }}

<h4>Vieneto kaina</h4>
{{Form::text('kaina', '', array('class'=>'form-control', 'type'=>'text', 'onChange' => "calculatePrice()")); }}

<h4>Nuolaida %</h4>
{{Form::text('nuolaida', '', array('class'=>'form-control', 'type'=>'text', 'onChange' => "calculatePrice()")); }}

<!-- Neredaguojamas laukas -->
<div id="pir_kaina"></div>

{{--
<!-- Redaguojamas laukas
<input type="text"  size = 96%  id="pir_kaina">-->
<h4>Vieneto pardavimo kaina</h4>
{{Form::text('pir_kaina', '', array('class'=>'form-control', 'type'=>'text', 'id'=>'pir_kaina')); }}
--}}

<h4>Kiekis</h4>
{{Form::text('kiekis', '', array('class'=>'form-control', 'type'=>'text')); }}

{{Form::macro('date', function($name, $value = null, $options = array()) {
$input =  '<input type="date" name="' . $name . '" value="' . $value . '"';

foreach ($options as $key => $value) {
$input .= ' ' . $key . '="' . $value . '"';
}

$input .= '>';

return $input;
});}}

<h4>Užsakymo data</h4>
{{ Form::date('data', '', array('class'=>'form-control', 'type'=>'date')) }}

{{Form::submit('Pridėti', array('class'=>'btn btn-primary')); }}
{{ Form::close() }}

@stop