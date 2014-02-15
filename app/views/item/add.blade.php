@extends('layout.core')

@section('content')

    {{ Form::open(array($id, 'url' => 'item/add', 'class'=>'form-default')) }}

        <h3>Naujas produktas kategorijoje {{{Category::where('id', '=', $id)->first()->pavadinimas}}} :</h3>
        <br>
        {{Form::text('kategorija_id', $id, array('class'=>'form-control hidden', 'type'=>'text')); }}

        <h4>Pavadinimas</h4>
        {{Form::text('pavadinimas', '', array('class'=>'form-control', 'type'=>'text')); }}

        <h4>Kodas</h4>
        {{Form::text('kodas', '', array('class'=>'form-control', 'type'=>'text')); }}

        <h4>Kaina</h4>
        {{Form::text('kaina', '', array('class'=>'form-control', 'type'=>'text')); }}

        @foreach($attributes as $attribute)
            <h4>{{{ucfirst($attribute->atributas)}}}</h4>
            {{Form::text($attribute->atributas, '', array('class'=>'form-control', 'type'=>'text')); }}
        @endforeach
        <br>
        {{Form::submit('Pridėti', array('class'=>'btn btn-primary')); }}
    {{ Form::close() }}



@stop



