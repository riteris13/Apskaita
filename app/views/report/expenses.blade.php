@extends('layout.core')
@section('content')
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

<script src="/js/excelexport.min.js"></script>

<input type="text" class="input input-xs" style="width: 200px; text-align: left; font-size: 15px;">
<table id="tblExport"  class="table table-bordered table-condensed">

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
            Gas/oil/benzine/dyzeline
        </td>
        <td>
            <input type="text" class="input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Car wash
        </td>
        <td>
            <input type="text" class="  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Ice remover from the car window
        </td>
        <td>
            <input type="text" class="  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Car window liqued
        </td>
        <td>
            <input type="text" class="  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Car tyres
        </td>
        <td>
            <input type="text" class="  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Car wipers
        </td>
        <td>
            <input type="text" class="  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Car lamp
        </td>
        <td>
            <input type="text" class="  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Payment for the roads
        </td>
        <td>
            <input type="text" class="  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Car service/changing tyre
        </td>
        <td>
            <input type="text" class="  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Parking
        </td>
        <td>
            <input type="text" class="  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Taxi
        </td>
        <td>
            <input type="text" class="  input-xs">
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
            Phone
        </td>
        <td>
            <input type="text" class="  input-xs">
        </td>
    </tr>
    <tr>
    <tr>
        <td>
            Office expenses (paper and etc)
        </td>
        <td>
            <input type="text" class="  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            New bag for visits
        </td>
        <td>
            <input type="text" class="  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Computer parts, services
        </td>
        <td>
            <input type="text" class="  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Printer cartridge filling
        </td>
        <td>
            <input type="text" class="  input-xs">
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
            Debt payment for Bite Vodafone internet
        </td>
        <td>
            <input type="text" class="  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Payment for cash transfering to bank account
        </td>
        <td>
            <input type="text" class="  input-xs">
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
            Post
        </td>
        <td>
            <input type="text" class="  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Payment for material delivery
        </td>
        <td>
            <input type="text" class="  input-xs">
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
            Brochures for the seminar
        </td>
        <td>
            <input type="text" class="  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Promotions, advertisement layout and printing
        </td>
        <td>
            <input type="text" class="  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Copying
        </td>
        <td>
            <input type="text" class="  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Show
        </td>
        <td>
            <input type="text" class="  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Translation
        </td>
        <td>
            <input type="text" class="  input-xs">
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
            Dinner with doctors
        </td>
        <td>
            <input type="text" class="  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Christmas presents
        </td>
        <td>
            <input type="text" class="  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Christmas bags for presents
        </td>
        <td>
            <input type="text" class="  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Sweets
        </td>
        <td>
            <input type="text" class="  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Flowers for the doctors
        </td>
        <td>
            <input type="text" class="  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Souvenires
        </td>
        <td>
            <input type="text" class="  input-xs">
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
            Hotel
        </td>
        <td>
            <input type="text" class="  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Food
        </td>
        <td>
            <input type="text" class="  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Air tickets
        </td>
        <td>
            <input type="text" class="  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Taxi
        </td>
        <td>
            <input type="text" class="  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Train tickets
        </td>
        <td>
            <input type="text" class="  input-xs">
        </td>
    </tr>
    <tr>
        <td>
            Currency exchange
        </td>
        <td>
            <input type="text" class="  input-xs">
        </td>
    </tr>
    <tr>
        <td style="font-weight: bold;">
            Total expenses:
        </td>
        <td>
            <input type="text" class="  input-xs" style="font-weight: bold;">
        </td>
    </tr>

    </tbody>

</table>

{{ Form::close() }}

<div>
    <a id="btnExport" href="#" download="">Export</a>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#btnExport").on('click', function () {
            var uri = $("#tblExport").btechco_excelexport({
                containerid: "tblExport"
                , datatype: $datatype.Table
                , returnUri: true
            });

            $(this).attr('download', 'ExportToExcel.xls').attr('href', uri).attr('target', '_blank');
        });
    });
</script>

@stop