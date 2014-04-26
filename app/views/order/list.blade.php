@extends('layout.core')

<?php $header = trans('header.order.list'); ?>

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Užsakymų sąrašas</div>
        <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Užsakovas</th>
                        <th>Klinika</th>
                        <th>Produktas</th>
                        <th>Data</th>
                        <th>Kaina vnt.</th>
                        <th>Kiekis</th>
                        <th>Suma</th>
                        <th>Statusas</th>
                    </tr>
                </thead>

                <tbody >
                @foreach($orders as $order)
                @if ( $order->statusas == 1)
                    <tr bgcolor = "#B2FFB2">
                @else
                    <tr bgcolor = "#FFFFB2">
                @endif
                        <td>
                            {{{ $order->doctor->fullname}}}
                        </td>
                        <td>
                            {{{ $order->doctor->clinic->pavadinimas}}}
                        </td>
                        <td>
                            {{{ $order->product->pavadinimas}}}
                        </td>
                        <td>
                            {{{ $order->data}}}
                        </td>
                        <td>
                            {{{ $order->pir_kaina}}}
                        </td>
                        <td>
                            {{{ $order->kiekis}}}
                        </td>
                        <td>
                            {{{ $order->pir_kaina * $order->kiekis}}}
                        </td>
                        @if ( $order->statusas == 1)
                            <td>
                                {{"Įvykdytas"}}
                            </td>
                        @else
                        <td>
                            {{"Neįvykdytas"}}
                        </td>
                        @endif
                        <td class="text-right">
                            <a
                                class="btn btn-xs btn-primary" href="/order/edit/{{$order->id}}">
                                <span class="glyphicon glyphicon-pencil"></span> Redaguoti
                            </a>
                            <a
                                onclick="return confirm('Ar tikrai norite pašalinti užsakymą?')"
                                class="btn btn-xs btn-danger" href="/order/remove/{{$order->id}}">
                                <span class="glyphicon glyphicon-remove"></span> Pašalinti
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
        </table>
    </div>

    <a href="/order/add" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span> Pridėti naują užsakymą</a>

@stop