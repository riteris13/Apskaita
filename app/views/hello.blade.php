@extends('layout.core')
<?php $header = '';  ?>
@section('content')

    <div> <img src="{{asset('assets/img/logo.png');}}"> </div>

	<h1><?php echo trans('messages.welcome'); ?></h1>
    <br>
    <h4><?php echo trans('messages.intro'); ?></h4>

    <button type="button" class="btn btn-default" rel="tooltip" data-placement="bottom" title="Apačioj">Tooltip on bottom</button>

@stop