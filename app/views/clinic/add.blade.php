@extends('layout.core')

@section('content')

{{ Form::open(array('url' => 'clinic/add', 'class'=>'form-default')) }}
<h4>Pavadinimas</h4>
{{Form::text('pavadinimas', '', array('class'=>'form-control', 'type'=>'text')); }}
<h4>Adresas</h4>
{{Form::text('adresas', '', array('class'=>'form-control', 'type'=>'text')); }}
<h4>PVM mokėtojas</h4>
{{Form::checkbox('vat'); }}
<br>
<br>
{{Form::submit('Pridėti', array('class'=>'btn btn-primary')); }}

{{ Form::close() }}

@stop
