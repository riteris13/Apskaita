@extends('layout.core')

@section('content')

{{ Form::open(array('url' => 'doctor/add', 'class'=>'form-default')) }}
<h4>Vardas</h4>
{{Form::text('vardas', '', array('class'=>'form-control', 'type'=>'text')); }}
<h4>Pavardė</h4>
{{Form::text('pavarde', '', array('class'=>'form-control', 'type'=>'text')); }}
<h4>Klinika</h4>
{{Form::select('klinika_id', Clinic::lists('pavadinimas', 'id')); }}
<br>
<br>
{{Form::submit('Pridėti', array('class'=>'btn btn-primary')); }}

{{ Form::close() }}

@stop
