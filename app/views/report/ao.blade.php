@extends('layout.core')
@section('content')

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
                    {{ Form::text('name[]', $item->fullname, array('class'=>'rinkos'))}}
                </td>
                <td>
                    {{ Form::text('disc[]', $item->nuolaida, array('class'=>'rinkos'))}}
                </td>
                <td>
                    {{ Form::text('pot[]', $item->potencialumas, array('class'=>'rinkos'))}}
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
