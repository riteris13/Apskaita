@extends('layout.core')
@section('content')

<h3 style="text-align: center;">Information about the customers 2014</h3>

<table class="table table-bordered">
    <thead>
        <tr>
            <td>Name, Surname</td>
            <td>Which products he use from us</td>
            <td>Which products from other company</td>
            <td>Why he doesn't use our products</td>
            <td>My idea to make this doctor our customer</td>
        </tr>
    </thead>
    <tbody>
    @foreach($doctors as $doctor)
    <tr>
        <td>
            {{{ $doctor->fullname }}}
        </td>
        <td>
            <?php $visipavadinimai = array(); ?>
            @foreach($doctor->order as $items)
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
            @foreach($doctor->notourproduct as $item)
                {{$item->product->pavadinimas}}<br>
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

@stop