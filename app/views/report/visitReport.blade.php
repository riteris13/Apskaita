@extends('layout.core')

@section('content')
{{ Form::open(array('url' => 'export/visitreport')) }}
{{ Form::hidden('id', $visit->id)}}
<table class="table table-bordered">
    <tbody>
    <tr>
        <td class="text-center" style="background-color: lightgray" colspan="4">
            {{ Form::text('data', $visit->data, array('class'=>'text'))}}
        </td>
    </tr>
    <tr>
        <td>
            Aim
        </td>
        <td>
            Conversation
        </td>
        <td>
            Order (psc)
        </td>
        <td>
            Competition
        </td>
    </tr>
    <tr>
        <td>
            {{ Form::text('tikslas', $visit->tikslas, array('class'=>'text'))}}
        </td>
        <td>
            {{ Form::text('pokalbis', $visit->pokalbis, array('class'=>'text'))}}
        </td>
        <td>
            <table class="table table-bordered">
                <tr>
                    <td style="background-color: darkgray">
                        AO
                    </td>
                    <td style="background-color: darkgray"></td>
                </tr>
                <tr>
                    <td>
                        Brackets
                    </td>
                    <td>
                        Tubes
                    </td>
                    <td>
                        Bands
                    </td>
                    <td>
                        Wires
                    </td>
                    <td>
                        Plastic
                    </td>
                    <td>
                        Instuments
                    </td>
                    <td>
                        Aarhus
                    </td>
                    <td>
                        Other
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
            </table>
        </td>
        <td>
            {{ Form::text('kompetitoriai', $visit->kompetitoriai, array('class'=>'text'))}}
        </td>
    </tr>
    <tr>
        <td></td>
        <td style="text-align: right">
            Price total:
        </td>
        <td>
            <table class="table table-bordered">
                <td>{{ Form::text('total[]', '', array('class'=>'text'))}}</td>
                <td>{{ Form::text('total[]', '', array('class'=>'text'))}}</td>
                <td>{{ Form::text('total[]', '', array('class'=>'text'))}}</td>
                <td>{{ Form::text('total[]', '', array('class'=>'text'))}}</td>
                <td>{{ Form::text('total[]', '', array('class'=>'text'))}}</td>
                <td>{{ Form::text('total[]', '', array('class'=>'text'))}}</td>
                <td>{{ Form::text('total[]', '', array('class'=>'text'))}}</td>
                <td>{{ Form::text('total[]', '', array('class'=>'text'))}}</td>
                <td>{{ Form::text('total[]', '', array('class'=>'text'))}}</td>
                <td>{{ Form::text('total[]', '', array('class'=>'text'))}}</td>
            </table>
        </td>
    </tr>
    </tbody>
</table>
{{Form::submit("Export XLS", array('class'=>'btn btn-primary', 'name' => 'XLS')); }}
&nbsp;
{{Form::submit("Export PDF", array('class'=>'btn btn-primary', 'name' => 'PDF')); }}
{{ Form::close() }}
@stop