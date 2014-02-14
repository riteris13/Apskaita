@extends('layout.core')

@section('content')

{{ Form::open(array('url' => 'category/add', 'class'=>'form-default')) }}

    <h4>Kategorijos pavadinimas</h4>
        {{Form::text('pavadinimas', '', array('class'=>'form-control', 'type'=>'text')); }}

    <h4>Pažymėkite reikalingus atributus:</h4>
    Sistema
    {{Form::checkbox('sistema'); }}
    <br>
    Slotas
    {{Form::checkbox('slotas'); }}
    <br>
    Kabliukai
    {{Form::checkbox('kabliukai'); }}
    <br>
    Pusė
    {{Form::checkbox('puse'); }}
    <br>
    Žandikaulis
    {{Form::checkbox('zandikaulis'); }}
    <br>
    Sukimas
    {{Form::checkbox('sukimas'); }}
    <br>
    Rotacija
    {{Form::checkbox('rotacija'); }}
    <br>
    Dydis
    {{Form::checkbox('dydis'); }}
    <br>
    Žvėrelis
    {{Form::checkbox('zverelis'); }}
    <br>
    Spalva
    {{Form::checkbox('spalva'); }}
    <br>
    <br>
    {{Form::submit('Pridėti', array('class'=>'btn btn-primary')); }}
{{ Form::close() }}

@stop
