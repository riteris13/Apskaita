@extends('layout.core')
@section('content')
<script src="/js/expenses.js"></script>
<style>
    .input-xs {
        height: 16px;
        padding: 0px 0px;
        font-size: 13px;
        line-height: 0px;
        border: 0px;
        box-shadow: 0px;
        outline: 0 none;
        text-align: right;
        width: 100%;
    }
    .input-xs2 {
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
    .gray {
        text-align: center;
        background-color: darkgray !important;
    }
</style>

{{ Form::open(array('url' => 'export/expenses', 'class'=>'input input-xs', 'style'=>'width: 600px; text-align: left; font-size: 15px;')) }}
<!--<input type="text" class="input input-xs" style="width: 200px; text-align: left; font-size: 15px;">-->
<input name="data" style="text-align: left" type="text"  class="input-xs" value="{{ date('F')}}, {{ date('Y')}}" id="data">
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
        <td class="gray">
            Car Expenses
        </td>
        <td class="gray">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Gas/oil/benzine/dyzeline">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Car wash">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Ice remover from the car window">
        </td>
        <td>
          <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Car window liqued">

        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Car tyres">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Car wipers">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Car lamp">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Payment for the roads">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Car service/changing tyre">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Parking">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Taxi">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td class="gray">
            Office expenses/needs
        </td>
        <td class="gray">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Phone">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Office expenses (paper and etc)">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="New bag for visits">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Computer parts, services">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Printer cartridge filling">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td class="gray">
            Financial operations
        </td>
        <td class="gray">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Debt payment for Bite Vodafone internet">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Payment for cash transfering to bank account">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td class="gray">
            Delivery services
        </td>
        <td class="gray">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Post">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Payment for material delivery">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td class="gray">
            Advertising/promo
        </td>
        <td class="gray">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Brochures for the seminar">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Promotions, advertisement layout and printing">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Copying">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Show">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Translation">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td class="gray">
            Representation expenses
        </td>
        <td class="gray">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Dinner with doctors">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Christmas presents">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Christmas bags for presents">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Sweets">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Flowers for the doctors">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Souvenires">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td class="gray">
            Traveling
        </td>
        <td class="gray">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Hotel">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Food">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Air tickets">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Taxi">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Train tickets">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td>
            <input name="line-xs[]" type="text" class="input-xs2" value="Currency exchange">
        </td>
        <td>
            <input name="input-xs[]" type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td style="font-weight: bold;">
            Total expenses:
        </td>
        <td>
            <input name="total" type="text" class="input-xs" style="font-weight: bold;" id="total">
        </td>
    </tr>

    </tbody>

</table>
{{Form::submit("Export PDF", array('class'=>'btn btn-primary')); }}
{{ Form::close() }}

<div>

</div>

@stop