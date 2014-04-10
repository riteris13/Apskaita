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
                </tr>
            @endforeach
            </tbody>
    </table>
</div>


@stop