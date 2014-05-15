@extends('layout.core')
<?php $header = '';  ?>
@section('content')

    <div> <img src="{{asset('assets/img/logo.png');}}"> </div>

	<h1><?php echo trans('messages.welcome'); ?></h1>
    <br>
    <h4><?php echo trans('messages.intro'); if(Auth::user()->role == 'direktore'){echo trans('messages.link');} ?></h4>

@stop