@extends('layout.core')
@section('content')

{{ Form::open(array('url' => '/auth/change', 'class'=>'form-signin')) }}
<?php
    $oldpwd = trans("user.oldpwd");
    $newpwd =  trans("user.newpwd");
    $confpwd = trans("user.confpwd");
    $bpwdchange = trans("user.bpwdchange");
?>
<div style="width: 40%; margin-left: 30%">
    <h2>{{trans('user.pwdchange')}} {{User::find(Auth::user()->id)->email}}</h2>
    <br>
    {{Form::password('OldPassword', array('type'=>'password', 'class'=>'form-control',
            'placeholder'=>"$oldpwd", 'required', 'id' => 'OldPassword'))}}
    <br>

    {{Form::password('NewPassword', array('type'=>'password', 'class'=>'form-control',
            'placeholder'=>"$newpwd", 'required', 'id' => 'NewPassword'))}}
    <br>

    {{Form::password('NewPassword2', array('type'=>'password', 'class'=>'form-control',
            'placeholder'=>"$confpwd", 'required', 'id' => 'NewPassword2'))}}
    <br>

    {{Form::submit("$bpwdchange",array('class'=>'btn btn-lg btn-primary btn-block', 'style' => 'width: 50%; margin-left: 25%;', 'value' => 'change')); }}
</div>
{{ Form::close() }}
@stop