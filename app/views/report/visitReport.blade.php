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
    .textarea{
        border: 0px;
        box-shadow: 0px;
        outline: 0 none;
        text-align: left;
        width: 100%;
        height: 100%;
        resize: none;
    }
    .date{
        height: 16px;
        padding: 0px 0px;
        font-size: 13px;
        line-height: 0px;
        box-shadow: 0px;
        outline: 0 none;
        text-align: center;
        background-color: lightgray;
    }
    .td{
        text-align: center;
        background-color: lightgray;
    }
    .td2{
        text-align: center;
        background-color: gray;
    }
    .table-condensed>tbody>tr>td {
        padding: 0px;
        height: 15px;
        font-size: 13px;
    }
</style>
{{ Form::open(array('url' => 'export/visitreport')) }}
{{ Form::hidden('id', $visit->id)}}
<table class="table table-bordered">
    <tbody>
    <tr>
        <td class="td" colspan="13">
            {{ Form::text('data', $visit->data, array('class'=>'date'))}}
        </td>
    </tr>
    <tr>
        <td style="width: 200px; text-align: center">
            Aim
        </td>
        <td style="width: 300px; text-align: center">
            Conversation
        </td>
       <td colspan="10" style="text-align: center">
            Order (psc)
        </td>
        <td style="width: 200px; text-align: center">
            Competition
        </td>
    </tr>
    <tr>
        <td rowspan="5">
            {{ Form::textarea('tikslas', $visit->tikslas, array('class'=>'textarea'))}}
        </td>
        <td rowspan="5">
            {{ Form::textarea('pokalbis', $visit->pokalbis, array('class'=>'textarea'))}}
        </td>
        <td class="td2" colspan="8">
            AO
        </td>
        <td class="td2" colspan="2"></td>
        <td rowspan="5">
            {{ Form::textarea('kompetitoriai', $visit->kompetitoriai, array('class'=>'textarea'))}}
        </td>
    </tr>
    <tr>
        <td colspan="3" class="td2">
            Brackets
        </td>
        <td class="td2" rowspan="2">
            Tubes
        </td>
        <td class="td2" rowspan="2">
            Bands
        </td>
        <td class="td2" rowspan="2">
            Wires
        </td>
        <td class="td2" rowspan="2">
            Plastic
        </td>
        <td class="td2" rowspan="2">
            Instuments
        </td>
        <td class="td2" rowspan="2">
            Aarhus
        </td>
        <td class="td2" rowspan="2">
            Other
        </td>
    </tr>
    <tr>
        <td class="td2">
            Ceramic
        </td>
        <td class="td2">
            Metal
        </td>
        <td class="td2">
            Other
        </td>
    </tr>
    <tr>
        <td>
            {{ Form::text('item[]', '', array('class'=>'text'))}}
        </td>
        <td>
            {{ Form::text('item[]', '', array('class'=>'text'))}}
        </td>
        <td>
            {{ Form::text('item[]', '', array('class'=>'text'))}}
        </td>
        <td>
            {{ Form::text('item[]', '', array('class'=>'text'))}}
        </td>
        <td>
            {{ Form::text('item[]', '', array('class'=>'text'))}}
        </td>
        <td>
            {{ Form::text('item[]', '', array('class'=>'text'))}}
        </td>
        <td>
            {{ Form::text('item[]', '', array('class'=>'text'))}}
        </td>
        <td>
            {{ Form::text('item[]', '', array('class'=>'text'))}}
        </td>
        <td>
            {{ Form::text('item[]', '', array('class'=>'text'))}}
        </td>
        <td>
            {{ Form::text('item[]', '', array('class'=>'text'))}}
        </td>
    </tr>
    <tr>
        <td>
            {{ Form::text('kiekis[]', '', array('class'=>'text'))}}
        </td>
        <td>
            {{ Form::text('kiekis[]', '', array('class'=>'text'))}}
        </td>
        <td>
            {{ Form::text('kiekis[]', '', array('class'=>'text'))}}
        </td>
        <td>
            {{ Form::text('kiekis[]', '', array('class'=>'text'))}}
        </td>
        <td>
            {{ Form::text('kiekis[]', '', array('class'=>'text'))}}
        </td>
        <td>
            {{ Form::text('kiekis[]', '', array('class'=>'text'))}}
        </td>
        <td>
            {{ Form::text('kiekis[]', '', array('class'=>'text'))}}
        </td>
        <td>
            {{ Form::text('kiekis[]', '', array('class'=>'text'))}}
        </td>
        <td>
            {{ Form::text('kiekis[]', '', array('class'=>'text'))}}
        </td>
        <td>
            {{ Form::text('kiekis[]', '', array('class'=>'text'))}}
        </td>
    </tr>
    <tr>
        <td></td>
        <td style="text-align: right">
            Price total:
        </td>
        <td>
            {{ Form::text('total[]', '', array('class'=>'text'))}}
        </td>
        <td>
            {{ Form::text('total[]', '', array('class'=>'text'))}}
        </td>
        <td>
            {{ Form::text('total[]', '', array('class'=>'text'))}}
        </td>
        <td>
            {{ Form::text('total[]', '', array('class'=>'text'))}}
        </td>
        <td>
            {{ Form::text('total[]', '', array('class'=>'text'))}}
        </td>
        <td>
            {{ Form::text('total[]', '', array('class'=>'text'))}}
        </td>
        <td>
            {{ Form::text('total[]', '', array('class'=>'text'))}}
        </td>
        <td>
            {{ Form::text('total[]', '', array('class'=>'text'))}}
        </td>
        <td>
            {{ Form::text('total[]', '', array('class'=>'text'))}}
        </td>
        <td>
            {{ Form::text('total[]', '', array('class'=>'text'))}}
        </td>
        <td></td>
    </tr>

    </tbody>
</table>
{{Form::submit("Export XLS", array('class'=>'btn btn-primary', 'name' => 'XLS')); }}
&nbsp;
{{Form::submit("Export PDF", array('class'=>'btn btn-primary', 'name' => 'PDF')); }}
{{ Form::close() }}
@stop