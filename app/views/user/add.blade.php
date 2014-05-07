@extends('layout.core')
@section('content')

{{ Form::open(array('url' => '/auth/add', 'class'=>'form-signin')) }}

    <h2> {{{trans('table.addUser')}}}</h2>
    <br>
    {{Form::text('email', '', array('type'=>'text', 'class'=>'form-control'))}}

    <br>
    <h4> {{{trans('table.newRol')}}}</h4>
    <p><b> {{{trans('table.dir')}}} </b>{{ Form::radio('role', 'direktore'); }}</p>
    <p><b> {{{trans('table.ats')}}} </b>{{ Form::radio('role', 'atstovas'); }}</p>
    <br>

    {{Form::submit(trans('table.cre'),array('class'=>'btn btn-lg btn-primary btn-block')); }}

    {{ Form::hidden('first-login', '1') }}

{{ Form::close() }}

@stop