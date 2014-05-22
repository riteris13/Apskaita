@extends('layout.core')
<?php $i=0; ?>
@section('content')
<style>
    .names,
    .code,
    .total{
        height: 16px;
        padding: 0px 0px;
        font-size: 13px;
        line-height: 0px;
        border: 0px;
        box-shadow: 0px;
        outline: 0 none;
    }
    .total{
        text-align: right;
        width: 60%;
    }
    .code{
        text-align: center;
        width: 100%;
    }
    .names{
        text-align: left;
        width: 100%;
    }
    .table-condensed>tbody>tr>td {
        padding: 0px;
        height: 15px;
        font-size: 13px;
    }
</style>

{{ Form::open(array('url' => 'export/purchases')) }}
<table class="table table-bordered">
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
            {{ Form::text('doctor[]', $doctor->fullname, array('class'=>'names'))}}
        </td>
        <td>
            {{ Form::text('clinic[]', $doctor->clinic->pavadinimas, array('class'=>'names'))}}
        </td>
        <td class="col-sm-2 text-left">
            {{ Form::text('code[]', $doctor->clinic->kodas, array('class'=>'code'))}}
        </td>
        <td class="col-sm-3 text-left">
            <?php $visipavadinimai = array(); ?>
            <?php $suma = 0 ?>
            @foreach($doctor->orders as $items)
            @foreach($items->orders as $item)
            <?php array_push($visipavadinimai, $item->product->pavadinimas);
                $suma += $item->pir_kaina * $item->kiekis ?>
            @endforeach
            @endforeach
            <?php $pavadinimai = array_unique($visipavadinimai); ?>
            @foreach($pavadinimai as $pavadinimas)
            {{ Form::text('names[]', $pavadinimas, array('class'=>'names'))}}
            @endforeach
            {{ Form::hidden('namesNum[]', count($pavadinimai))}}
        </td>
        <td class="text-right">
            {{ Form::text('total[]', $suma, array('class'=>'total'))}}{{{" Lt"}}}
        </td>
        @endforeach
    </tr>
    </tbody>
</table>

<div>
</div>
{{Form::submit("Export XLS", array('class'=>'btn btn-primary', 'name' => 'XLS')); }}
&nbsp;
{{Form::submit("Export PDF", array('class'=>'btn btn-primary', 'name' => 'PDF')); }}
{{ Form::close() }}
@stop