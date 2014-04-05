@extends('layout.core')

@section('content')

    <div> <img src="logo.png"> </div>

	<h1><?php echo trans('messages.welcome'); ?></h1>
    <br>
    <h4><?php echo trans('messages.intro'); ?></h4>

@stop