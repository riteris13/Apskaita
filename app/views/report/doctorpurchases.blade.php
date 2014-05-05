@extends('layout.core')

<? $i=0; ?>
@section('content')

<script src="/js/excelexport.min.js"></script>

<table id="tblExport" class="table table-bordered">
    <thead style="font-weight: bold; text-align: center;">
        <tr>
            <td>Nb </td>
            <td>Doctor name</td>
            <td>Clinic name</td>
            <td>Clinic address, VAT or clinic code</td>
            <td>What doctors are buying from us</td>
            <td>Sales in 2014</td>
        </tr>
    </thead>
    <tbody>

    @foreach($doctors as $doctor)
    <? $i++; ?>
    <tr>
        <td>
           {{{ $i }}}
        </td>
        <td>
            {{{ $doctor->fullname }}}
        </td>
        <td>
            {{{ $doctor->clinic->pavadinimas }}}
        </td>
        <td>
            {{{ $doctor->clinic->kodas }}}
        </td>
        <td>
            <?php $visipavadinimai = array(); ?>
            <? $suma = 0 ?>
            @foreach($doctor->order as $items)
            @foreach($items->orders as $item)
            <?php array_push($visipavadinimai, $item->product->pavadinimas); ?>
            <? $suma += $item->pir_kaina * $item->kiekis ?>
            @endforeach
            @endforeach
            <?php $pavadinimai = array_unique($visipavadinimai); ?>
            @foreach($pavadinimai as $pavadinimas)
            {{{$pavadinimas}}}
            @endforeach
        </td>
        <td>
            {{{$suma}}} {{{"Lt"}}}
        </td>

        @endforeach
    </tr>
    </tbody>

</table>

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