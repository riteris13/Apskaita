@extends('layout.core')
<?php $header = "Pardavimai bendri 2014 metų"; ?>
<?php $i=0;?>
@section('content')
<script src="/js/salesReport.js"></script>
<style>
    .rinkos,
    .dol,
    .amount,
    .ltl,
    .names,
    .dollar{
        height: 16px;
        padding: 0px 0px;
        font-size: 13px;
        line-height: 0px;
        border: 0px;
        box-shadow: 0px;
        outline: 0 none;
    }
    .ltl,
    .dol{
        text-align: right;
        width: 60%;
    }
    .amount,
    .rinkos{
        text-align: center;
        width: 100%;
    }
    .names{
        text-align: left;
        width: 100%;
    }
    .dollar{
        text-align: left;
        width: 10%;
    }
    .table-condensed>tbody>tr>td {
        padding: 0px;
        height: 15px;
        font-size: 13px;
    }
</style>

{{ Form::open(array('url' => 'export/sales')) }}
{{ "Dolerio kursas: ", Form::text('Doleris', 2.5031,  array('id'=>'Dol_val', 'class'=>'dollar'))}}
<br><br>
<table class="table table-bordered" id="tblSales">    <!-- max table dydziui style="width:842px" -->
    <thead style="font-weight: bold; text-align: center;">
    <tr>
        <td>Eil. Nr.</td>
        <td>Prekės pavadinimas</td>
        <td>Kiekis</td>
        <td>Suma $ Ir LT</td>
        <td>Užimama rinkos dalis %</td>
    </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
    <tr>
        <td class="text-center">
            {{{++$i}}}
        </td>
        <td class="text-left">
            {{ Form::text('name[]', $item->pavadinimas, array('class'=>'names'))}}
        </td>
        <td>
            <?php $kiekis=0; $suma=0;?>
            @foreach($item->orders as $order)
            <?php $kiekis += $order->kiekis ?>
            <?php $suma += $order->pir_kaina * $order->kiekis ?>
            @endforeach
            {{ Form::text('amount[]', $kiekis, array('class'=>'amount'))}}
        </td>
        <td>
            {{ Form::text('dol[]',null, array('class'=>'dol'))}}$ <br> {{ Form::text('ltl[]', number_format($suma, 2,
                '.', ''), array('class'=>'ltl'))}}LT
        </td>
        <td>
            {{ Form::text('rinkos[]', null, array('class'=>'rinkos'))}}
        </td>
    </tr>
    @endforeach
    <td></td>
    <td></td>
        <td>Bendra suma:</td>
        <td> {{ Form::text('bendraSuma', null,  array('id'=>'Total')) }} </td>
    <td></td>
    </tbody>
</table>
{{Form::submit("Export XLS", array('class'=>'btn btn-primary', 'name' => 'XLS')); }}
&nbsp;
{{Form::submit("Export PDF", array('class'=>'btn btn-primary', 'name' => 'PDF')); }}
{{ Form::close() }}

@stop