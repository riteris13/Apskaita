@extends('layout.core')

<?php $header = "Information about the customers 2014"; ?>
<?php $i=0; ?>
@section('content')

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
            {{{ $i.". "}}}{{{ $doctor->fullname }}}
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
                {{{$pavadinimas}}},
            @endforeach
        </td>
        <td>
            @foreach($doctor->notourproduct as $item)
                {{$item->product->pavadinimas}},
            @endforeach
        </td>
        <td>
            {{{ $doctor->kodel_neperka }}}
        </td>
        <td>
            {{{ $doctor->kaip_pritraukti }}}
        </td>
        @endforeach
    </tr>
    </tbody>

</table>

<div>
    <a href="/export/xls/iatc" class="btn btn-primary" >Export XLS</a>
    <a href="/export/pdf/iatc" class="btn btn-primary" >Export PDF</a>
</div>

@stop