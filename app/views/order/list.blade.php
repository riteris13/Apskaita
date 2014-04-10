@extends('layout.core')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Užsakymų sąrašas</div>
    <table class="table table-hover">
            <thead>
                <tr>
                    <th>Vardas</th>
                    <th>Pavardė</th>
                    <th>Klinika</th>
                    <th>Produktas</th>
                    <th>Data</th>
                    <th>Pardavimo kaina</th>
                    <th>Kiekis</th>
                    <th>Suma</th>
                </tr>
            </thead>

            <tbody >
            @foreach($orders as $order)
                <tr>
                    <td>
                        {{{ $order->doctor->vardas}}}
                    </td>
                    <td>
                        {{{ $order->doctor->pavarde}}}
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
                        {{{ $order->kaina}}}
                    </td>
                    <td>
                        {{{ $order->kiekis}}}
                    </td>
                    <td>
                        {{{ $order->kaina * $order->kiekis}}}
                    </td>
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