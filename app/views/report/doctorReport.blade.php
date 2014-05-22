@extends('layout.core')

@section('content')
<?php
    if($laikas == 0){
        $prev = Order::where('daktaras_id', '=', $doctor->id)->min('data');

    }else{
        $prev = date("Y-m-d", strtotime("-$laikas months"));
    }
    $tY = date("Y");
    $pY = substr($prev, 0 , 4);
    $pY2 = $pY;
    $i = 0;
?>
{{ Form::open(array('url' => 'export/doctorreport')) }}
<table class="table table-bordered">
    <tbody>
    <tr>
        <td>
            Doctor name:
        </td>
        <td>
            {{ Form::text('doctor', $doctor->fullname)}}
        </td>
    </tr>
    <tr>
        <td>
            Clinic name, address
        </td>
                <td>
                    <b> {{ Form::text('clinic', $doctor->clinic->pavadinimas)}}</b> <br>
                </td>
                <td>
                    {{ Form::text('clinicAdr', $doctor->clinic->adresas)}} <br>
                    <b> Company code:{{ Form::text('clinicCode', $doctor->clinic->kodas)}}</b> <br>
                    <b> @if($doctor->clinic->vat == 0 )
                        {{ Form::text('VAT', "Not VAT payer")}}
                        @else
                        {{ Form::text('VAT', "VAT payer")}}
                        @endif
                    </b> <br>
                </td>

        <td>
            AO %
            <br> Fixed discount on pricelist {{ Form::text('disc', $doctor->nuolaida)}}
        </td>
    </tr>
    <tr>
        <td></td>
            @if($tY == $pY)
               <td>
                   {{ Form::text('year[]', $tY)}}
               </td>
            @else
                @while($tY >= $pY)
                    <td>
                        {{ Form::text('year[]', $pY)}}
                    </td>
                <?php $pY += 1 ?>
                @endwhile
            @endif
    </tr>
    <tr>
        <td>
            Sales (LTL)
        </td>
        @if($tY == $pY)
        <?php $suma[0] = 0; ?>
            @foreach($doctor->orders as $order)
                @if($order->data >= $prev)
                    @foreach($order->orders as $item)
                        <?php $suma[0] = $suma[0] + $item->pir_kaina*$item->kiekis; ?>
                    @endforeach
                @endif
            @endforeach
        @else
            @while($tY >= $pY2)
            <?php $suma[$i] = 0;  ?>
                @foreach($doctor->orders as $order)
                <?php $uzData = $order->data; ?>
                    @if($uzData >= $prev && substr($uzData, 0 , 4) == $pY2)
                        @foreach($order->orders as $item)
                            <?php $suma[$i] = $suma[$i] + $item->pir_kaina*$item->kiekis; ?>
                        @endforeach
                    @endif
                @endforeach
            <?php $pY2 += 1; $i+=1; ?>
            @endwhile
        @endif
        @foreach($suma as $sum)
            <td>
                {{ Form::text('total[]', $sum)}}
            </td>
        @endforeach
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
            {{ Form::text('names[]', $doctor->detales)}}
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
            {{ Form::text('names[]', $pavadinimas)}}<br>
            @endforeach
        </td>
        <td>

        </td>
        <td>

        </td>
        <td>
            @foreach($doctor->notourproduct as $item)
            {{ Form::text('nnames[]', $item->product->pavadinimas)}}<br>
            @endforeach
        </td>
        <td>
            {{ Form::text('score', $doctor->ivertinimas)}}
        </td>
    </tr>
    </tbody>
</table>
{{Form::submit("Export XLS", array('class'=>'btn btn-primary', 'name' => 'XLS')); }}
&nbsp;
{{Form::submit("Export PDF", array('class'=>'btn btn-primary', 'name' => 'PDF')); }}
{{ Form::close() }}
@stop