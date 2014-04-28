@extends('layout.core')

<?php $header = trans('header.order.list'); ?>

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Užsakymų rūšiavimas</div>
    {{ Form::open(array('url' => 'order', 'class'=>'form-default')) }}
    <h4>Statusas</h4>
    {{Form::select('status', array('2' => 'Visi', '1' => 'Įvykdyti', '0' => 'Neįvykdyti'), null, array('class'=>'form-control')); }}
    <br>
    {{Form::submit('Rūšiuoti', array('class'=>'btn btn-primary')); }}

    {{ Form::close() }}
</div>
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
                @foreach($items as $item)
                @if ( $item->statusas == 1)
                    <tr bgcolor = "#B2FFB2">
                @else
                    <tr bgcolor = "#FFFFB2">
                @endif
                        <td>
                            {{{ $item->doctor->fullname}}}
                        </td>
                        <td>
                            {{{ $item->doctor->clinic->pavadinimas}}}
                        </td>
                        <td>
                            {{{ $item->product->pavadinimas}}}
                        </td>
                        <td>
                            {{{ $item->data}}}
                        </td>
                        <td>
                            {{{ $item->pir_kaina}}}
                        </td>
                        <td>
                            {{{ $item->kiekis}}}
                        </td>
                        <td>
                            {{{ $item->pir_kaina * $item->kiekis}}}
                        </td>
                        @if ( $item->statusas == 1)
                            <td>
                                {{"Įvykdytas"}}
                            </td>
                        @else
                        <td>
                            {{"Neįvykdytas"}}
                        </td>
                        @endif
                        <td class="text-right">
                            @if ( $item->statusas == 0)
                            <a
                                onclick="return confirm('Ar tikrai norite norite pakeisti užsakymo statusą?')"
                                class="btn btn-xs btn-primary" href="/order/status/{{$item->id}}">
                                <span class="glyphicon glyphicon-thumbs-up"></span>
                            </a>
                            @else
                            <a
                                onclick="return confirm('Ar tikrai norite norite pakeisti užsakymo statusą?')"
                                class="btn btn-xs btn-danger" href="/order/status/{{$item->id}}">
                                <span class="glyphicon glyphicon-thumbs-down"></span>
                            </a>
                            @endif
                            <a
                                class="btn btn-xs btn-primary" href="/order/edit/{{$item->id}}">
                                <span class="glyphicon glyphicon-pencil"></span> Redaguoti
                            </a>
                            @if ( $item->statusas == 0)
                            <a
                                onclick="return confirm('Ar tikrai norite pašalinti užsakymą?')"
                                class="btn btn-xs btn-danger" href="/order/remove/{{$item->id}}">
                                <span class="glyphicon glyphicon-remove"></span> Pašalinti
                            </a>
                            @else
                            <a
                                onclick="return confirm('Ar tikrai norite norite archyvuoti užsakymą?')"
                                class="btn btn-xs btn-danger" href="/order/archive/{{$item->id}}">
                                <span class="glyphicon glyphicon-briefcase"></span> Archyvuoti
                            </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
        </table>
    </div>
    <p>  {{ $items->links() }} </p>
    <a href="/order/add" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span> Pridėti naują užsakymą</a>

@stop