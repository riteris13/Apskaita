@extends('layout.core')
@section('content')


{{ Form::open(array('url' => 'order/add', 'class'=>'form-default')) }}

<h4>Klientas</h4>
{{Form::select('daktaras_id', Doctor::all()->lists('fullName', 'id')); }}

<h4>Produktas</h4>
{{Form::select('produktas_id', Item::lists('pavadinimas', 'id')); }}

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