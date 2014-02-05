@extends('layout.core')

@section('content')

@foreach($items as $item)
<h6>{{{ $item->all()}}}</h6>
@endforeach

@stop