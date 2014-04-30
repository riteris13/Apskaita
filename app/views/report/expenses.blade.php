@extends('layout.core')
@section('content')
<style>
    .input-xs {
        height: 24px;
        padding: 0px 0px;
        font-size: 12px;
        line-height: 0;
        border: 0;
        box-shadow: 0;
        outline: 0 none;
        text-align: right;
    }
</style>

<table class="table table-bordered table-condensed">

    <tbody>
    <tr>
        <td style="text-align: center; width: 70%;">
            Name
        </td>
        <td>

        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td style="text-align: center;">
            LTL
        </td>
    </tr>
    <tr>
        <td style="text-align: center; background-color: darkgray;">
            Car Expenses
        </td>
        <td style="background-color: darkgray">
        </td>
    </tr>
    <tr>
        <td>
            Gas/oil/benzine/dyzeline
        </td>
        <td>
            <input type="text" class="form-control input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Car wash
        </td>
        <td>
            <input type="text" class="form-control  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Ice remover from the car window
        </td>
        <td>
            <input type="text" class="form-control  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Car window liqued
        </td>
        <td>
            <input type="text" class="form-control  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Car tyres
        </td>
        <td>
            <input type="text" class="form-control  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Car wipers
        </td>
        <td>
            <input type="text" class="form-control  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Car lamp
        </td>
        <td>
            <input type="text" class="form-control  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Payment for the roads
        </td>
        <td>
            <input type="text" class="form-control  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Car service/changing tyre
        </td>
        <td>
            <input type="text" class="form-control  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Parking
        </td>
        <td>
            <input type="text" class="form-control  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Taxi
        </td>
        <td>
            <input type="text" class="form-control  input-xs">
        </td>
    </tr>
    <tr>
        <td style="text-align: center; background-color: darkgray;">
            Office expenses/needs
        </td>
        <td style="background-color: darkgray">
        </td>
    </tr>
    <tr>
        <td>
            Phone
        </td>
        <td>
            <input type="text" class="form-control  input-xs">
        </td>
    </tr>
    <tr>
    <tr>
        <td>
            Office expenses (paper and etc)
        </td>
        <td>
            <input type="text" class="form-control  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            New bag for visits
        </td>
        <td>
            <input type="text" class="form-control  input-xs">
        </td>
    </tr>
    <tr>
    <tr>

    </tbody>

</table>

{{ Form::close() }}

@stop