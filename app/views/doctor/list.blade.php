@extends('layout.core')

<?php $header = trans('header.doctor.list'); ?>

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">{{trans('header.doctor.table');}}</div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Vardas</th>
                <th>Pavardė</th>
                <th>Klinika</th>
                <th>Potencialumas</th>
                <th>Nuolaida %</th>
            </tr>
            </thead>
            <tbody >
            @foreach($items as $item)
            <tr>
                <td>
                    {{{ $item->vardas }}}
                </td>
                <td>
                    {{{ $item->pavarde }}}
                </td>
                <td>
                    {{{ $item->clinic->pavadinimas }}}
                </td>
                <td>
                    {{{ $item->potencialumas }}}
                </td>
                <td>
                    {{{ $item->nuolaida }}}
                </td>
                <td class="text-right">
					<a
						class="btn btn-xs btn-primary" rel="tooltip" data-placement="top" title="Redaguoti" href="/doctor/edit/{{$item->id}}">
						<span class="glyphicon glyphicon-pencil"></span>
					</a>
                    <a
                        onclick="return confirm('Ar tikrai norite pašalinti gydytoją?')"
                        class="btn btn-xs btn-danger" rel="tooltip" data-placement="top" title="Pašalinti" href="/doctor/remove/{{$item->id}}">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <p>  {{ $items->links() }} </p>
    <a href="/doctor/add" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span> Pridėti naują</a>

@stop