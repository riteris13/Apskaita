@extends('layout.core')

<?php $i=0; ?>
@section('content')

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
    <?php $i++; ?>
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
        <td class="col-sm-2 text-left">
            {{{ $doctor->clinic->kodas }}}
        </td>
        <td class="col-sm-3 text-left">
            <?php $visipavadinimai = array(); ?>
            <?php $suma = 0 ?>
            @foreach($doctor->orders as $items)
            @foreach($items->orders as $item)
            <?php array_push($visipavadinimai, $item->product->pavadinimas); ?>
            <?php $suma += $item->pir_kaina * $item->kiekis ?>
            @endforeach
            @endforeach
            <?php $pavadinimai = array_unique($visipavadinimai); ?>
            @foreach($pavadinimai as $pavadinimas)
            {{{$pavadinimas}}}
            @endforeach
        </td>
        <td class="text-right">
            {{{$suma}}} {{{"Lt"}}}
        </td>

        @endforeach
    </tr>
    </tbody>

</table>

<div>

</div>

@stop