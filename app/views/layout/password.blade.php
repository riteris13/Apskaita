@extends('layout.core')
@section('content')

{{ Form::open(array('url' => '/auth/change', 'class'=>'form-signin')) }}

<h2>Slaptažodžio keitimas</h2>

{{Form::password('OldPassword', array('type'=>'password', 'class'=>'form-control',
        'placeholder'=>'Old Password', 'required', 'id' => 'OldPassword'))}}
<br>

{{Form::password('NewPassword', array('type'=>'password', 'class'=>'form-control',
        'placeholder'=>'New Password', 'required', 'id' => 'NewPassword'))}}
<br>

{{Form::password('NewPassword2', array('type'=>'password', 'class'=>'form-control',
        'placeholder'=>'Confirm New Password', 'required', 'id' => 'NewPassword2'))}}
<br>

{{Form::submit('Pakeisti slaptažodį',array('class'=>'btn btn-lg btn-primary btn-block', 'value' => 'change')); }}

{{ Form::close() }}
@stop