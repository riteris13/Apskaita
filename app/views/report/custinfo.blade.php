@extends('layout.core')
@section('content')
<style>
    .text{
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
    .header{
        border: 0px;
        outline: 0 none;
        padding: 0px 0px;
        text-align: center;
        width: 100%;
    }
    .table-condensed>tbody>tr>td {
        padding: 0px;
        height: 15px;
        font-size: 13px;
    }
</style>
{{ Form::open(array('url' => 'export/iatc')) }}
<?php $header = Form::text('header', "Information about the customers 2014", array('class'=>'header')) ?>
<?php $i=0; ?>

<table class="table table-bordered">
    <thead style="font-weight: bold; text-align: center;">
        <tr>
            <td style="width: 20%;">Name, Surname</td>
            <td style="width: 25%;">Which products he use from us</td>
            <td style="width: 25%;">Which products from other company</td>
            <td>Why he doesn't use our products</td>
            <td>My idea to make this doctor our customer</td>
        </tr>
    </thead>
    <tbody>
    @foreach($doctors as $doctor)
    <?php $i++; ?>
    <tr>
        <td>
            {{ Form::text('names[]', $doctor->fullname, array('class'=>'text'))}}
        </td>
        <td>
            <?php $visipavadinimai = array(); ?>
            @foreach($doctor->orders as $items)
                @foreach($items->orders as $item)
                    <?php array_push($visipavadinimai, $item->product->pavadinimas); ?>
                @endforeach
            @endforeach
            <?php $pavadinimai = array_unique($visipavadinimai); $pc = 0; $npc = 0?>
            @foreach($pavadinimai as $pavadinimas)
            {{ Form::text('products[]', $pavadinimas, array('class'=>'text'))}}
            <?php $pc++;?>
            @endforeach
            {{ Form::hidden('pc[]', $pc)}}
        </td>
        <td>
            @foreach($doctor->notourproduct as $item)
            {{ Form::text('nproducts[]', $item->product->pavadinimas, array('class'=>'text'))}}
            <?php $npc++;?>
            @endforeach
            {{ Form::hidden('npc[]', $npc)}}
        </td>
        <td>
            {{ Form::text('neperka[]', $doctor->kodel_neperka, array('class'=>'text'))}}
        </td>
        <td>
            {{ Form::text('pritraukti[]', $doctor->kaip_pritraukti, array('class'=>'text'))}}
        </td>
        @endforeach
    </tr>
    </tbody>

</table>

{{Form::submit("Export XLS", array('class'=>'btn btn-primary', 'name' => 'XLS')); }}
&nbsp;
{{Form::submit("Export PDF", array('class'=>'btn btn-primary', 'name' => 'PDF')); }}
{{ Form::close() }}

@stop