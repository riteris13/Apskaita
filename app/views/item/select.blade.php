@extends('layout.core')

@section('content')
 <?php //headeris kuri reikia ideti i main layout ?>
    <div class="page-header">
        <h3>Naujo produkto pridėjimas</h3>
    </div>
{{ Form::open(array('url' => 'item/select', 'class'=>'form-default')) }}

    <h4>Pasirinkite kategoriją</h4>
    {{Form::select('kategorija_id', Category::lists('pavadinimas', 'id'), null, array('class'=>'form-control')); }}
    <br>
    {{Form::submit('Pasirinkti', array('class'=>'btn btn-primary')); }}
{{ Form::close() }}

@stop