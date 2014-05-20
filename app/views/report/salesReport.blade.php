@extends('layout.core')
<?php $header = "Pardavimai bendri 2014 metų"; ?>
<?php $i=0;  $tarpSum[] =0; $bSuma=0; $doleris=2.5031?>
@section('content')
<script src="/js/salesReport.js"></script>

{{ Form::open(array('url' => 'export/sales')) }}
{{ "Doleris:", Form::text('Baksas', 2.5031)}}

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
            {{ Form::text('name[]', $item->pavadinimas)}}
        </td>
        <td class="text-center">
            <?php $kiekis=0; $suma=0;?>
            @foreach($item->orders as $order)
            <?php $kiekis += $order->kiekis ?>
            <?php $suma += $order->pir_kaina * $order->kiekis ?>
            @endforeach
            <?php $bSuma += $suma; $tarpSum[] = $suma;?>
            {{ Form::text('amount[]', $kiekis)}}
        </td>
        <td >
            <?php $dol = round($suma/$doleris, 2) ?>
            {{ Form::text('dol[]', $dol)}}$ <br> {{ Form::text('ltl[]', $suma)}}LT
        </td>
        <td class="rinkos">
            {{ Form::text('rinkos[]', '')}}
        </td>
    </tr>
    @endforeach
    <td></td>
    <td></td>
        <td>Bendra suma:</td>
        <td> {{{$bSuma}}} </td>
    <td></td>
    </tbody>
</table>
{{Form::submit("Export XLS", array('class'=>'btn btn-primary', 'name' => 'XLS')); }}
&nbsp;
{{Form::submit("Export PDF", array('class'=>'btn btn-primary', 'name' => 'PDF')); }}
{{ Form::close() }}

<script> calculateTotal({{$bSuma}}, <?php echo json_encode($tarpSum); ?> )</script>
@stop