@extends('layout.core')

@section('content')

{{ Form::model($visit, array('url' => 'visit/edit', 'class'=>'form-default')) }}

    <h4>Tikslas</h4>
    {{Form::text('tikslas', $visit['tikslas'], array('class'=>'form-control', 'type'=>'text')); }}

    <h4>Pokalbis</h4>
    {{Form::textarea('pokalbis', $visit['pokalbis'], array('class'=>'form-control', 'type'=>'textarea')); }}

    <h4>Kompetitoriai</h4>
    {{Form::textarea('kompetitoriai', $visit['kompetitoriai'], array('class'=>'form-control', 'type'=>'textarea')); }}

    {{Form::macro('date', function($name, $value = null, $options = array()) {
        $input =  '<input type="date" name="' . $name . '" value="' . $value . '"';

        foreach ($options as $key => $value) {
            $input .= ' ' . $key . '="' . $value . '"';
        }

        $input .= '>';

        return $input;
    });}}

    <h4>Apsilankymo data</h4>
    {{ Form::date('data', $visit['data'], array('class'=>'form-control', 'type'=>'date')) }}

	{{Form::hidden('id', $visit['id']) }}
    <br>
    {{Form::submit('Atnaujinti', array('class'=>'btn btn-primary')); }}

{{ Form::close() }}

@stop
