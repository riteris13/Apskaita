@extends('layout.core')
@section('content')

<table class="table table-hover">

    <tbody>
    <tr>
        <td>
            Name
        </td>
        <td>

        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
            LTL
        </td>
    </tr>
    <tr>
        <td>
            Car Expenses
        </td>
        <td>
        </td>
    </tr>
    <tr>
        <td>
            Gas/oil/benzine/dyzeline
        </td>
        <td>
            {{Form::text('amount', '', array('class'=>'form-control', 'type'=>'text')); }}
        </td>
    </tr>
    <tr>
        <td>
            Car wash
        </td>
        <td>
        </td>
    </tr>
    <tr>
        <td>
            Ice remover from the car window
        </td>
        <td>
        </td>
    </tr>
    <tr>
        <td>
            Car window liqued
        </td>
        <td>
        </td>
    </tr>
    <tr>
        <td>
            Car tyres
        </td>
        <td>
        </td>
    </tr>
    <tr>
        <td>
            Car wipers
        </td>
        <td>
        </td>
    </tr>
    <tr>
        <td>
            Car lamp
        </td>
        <td>
        </td>
    </tr>
    <tr>
        <td>
            Payment for the roads
        </td>
        <td>
            {{Form::text('amount', '', array('class'=>'form-control', 'type'=>'text')); }}
        </td>
    </tr>
    <tr>
        <td>
            Car service/changing tyre
        </td>
        <td>
            {{Form::text('amount', '', array('class'=>'form-control', 'type'=>'text')); }}
        </td>
    </tr>
    <tr>
        <td>
            Parking
        </td>
        <td>
            {{Form::text('amount', '', array('class'=>'form-control', 'type'=>'text')); }}
        </td>
    </tr>
    <tr>
        <td>
            Taxi
        </td>
        <td>
            {{Form::text('amount', '', array('class'=>'form-control', 'type'=>'text')); }}
        </td>
    </tr>

    </tbody>

</table>

{{ Form::close() }}

@stop