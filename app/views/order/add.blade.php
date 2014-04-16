@extends('layout.core')
@section('content')

<script type="text/javascript" src="/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/jScript.js"></script>

{{ Form::open(array('url' => 'order/add', 'class'=>'form-default', 'id'=>'addOrder')) }}
{{ Form::hidden('count', 1) }}

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
{{Form::text('kaina', '', array('class'=>'form-control', 'type'=>'text', 'onChange' => "calculatePrice()",
            'id' => 'kaina' )); }}

<h4>Nuolaida %</h4>
{{Form::text('nuolaida', '', array('class'=>'form-control', 'type'=>'text', 'onChange' => "calculatePrice()",
            'oninput' => "calculatePrice()",'id' => 'nuolaida' )); }}

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