@extends('layout.core')

@section('content')

<table id="tblExport" class="table table-bordered">
    <tbody>
    <tr>
        <td>
            Doctor name:
        </td>
        <td>
            {{{ $doctor->fullname }}}
        </td>
    </tr>
    <tr>
        <td>
            Clinic name, address
        </td>
        <td>
            {{{ $doctor->clinic->pavadinimas }}}
        </td>
        <td>
            AO %
            <br> Fixed discount on pricelist {{{ $doctor->nuolaida}}}
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            Metai
        </td>
    </tr>
    <tr>
        <td>
            Sales (LTL)
        </td>
        <td>
            <? $suma = 0;?>
            @foreach($doctor->orders as $order)
                @foreach($order->orders as $item)
                    <? $suma+=$item->pir_kaina; ?>
                @endforeach
            @endforeach
            {{{ $suma }}}
        </td>
    </tr>
    <tr>
        <td style="line-height:7px;" colspan=6>&nbsp;</td>
    </tr>
    <th>
        Details about doctor
    </th>
    <th>
        What products buys
    </th>
    <th>
        What products likes
    </th>
    <th>
        Frequency (how often ordering)
    </th>
    <th>
        What competitors products use
    </th>
    <th style="width: 15%">
        Evaluation of the doctor (1-10 points system)
    </th>
    <tr>
        <td>
            {{{$doctor->detales}}}
        </td>
        <td>
            <?php $visipavadinimai = array(); ?>
            @foreach($doctor->orders as $items)
            @foreach($items->orders as $item)
            <?php array_push($visipavadinimai, $item->product->pavadinimas); ?>
            @endforeach
            @endforeach
            <?php $pavadinimai = array_unique($visipavadinimai); ?>
            @foreach($pavadinimai as $pavadinimas)
            {{{$pavadinimas}}}<br>
            @endforeach
        </td>
        <td>

        </td>
        <td>

        </td>
        <td>
            @foreach($doctor->notourproduct as $item)
            {{$item->product->pavadinimas}}<br>
            @endforeach
        </td>
        <td>
            {{{$doctor->ivertinimas}}}
        </td>
    </tr>
    </tbody>
</table>
@stop