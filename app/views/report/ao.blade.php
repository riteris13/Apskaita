@extends('layout.core')
@section('content')
<style>
    .text{
        height: 16px;
        padding: 0px 0px;
        font-size: 13px;
        line-height: 0px;
        border: 0px;
        box-shadow: 0px;
        outline: 0 none;
        text-align: left;
        width: 100%;
    }
    .table-condensed>tbody>tr>td {
        padding: 0px;
        height: 15px;
        font-size: 13px;
    }
</style>
<div class="panel panel-default">
    <div class="panel-heading"> AO </div>
    {{ Form::open(array('url' => 'export/ao')) }}
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Doctors</th>
                <th>Discount</th>
                <th>Potenciality</th>
            </tr>
        </thead>

        <tbody>
            @foreach($doctors as $item)
            <tr>
                <td>
                    {{ Form::text('name[]', $item->fullname, array('class'=>'text'))}}
                </td>
                <td>
                    {{ Form::text('disc[]', $item->nuolaida, array('class'=>'text'))}}
                </td>
                <td>
                    {{ Form::text('pot[]', $item->potencialumas, array('class'=>'text'))}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{Form::submit("Export XLS", array('class'=>'btn btn-primary', 'name' => 'XLS')); }}
&nbsp;
{{Form::submit("Export PDF", array('class'=>'btn btn-primary', 'name' => 'PDF')); }}
{{ Form::close() }}

@stop
