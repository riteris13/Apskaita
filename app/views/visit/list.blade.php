@extends('layout.core')

<?php $header = trans('header.visit.list'); ?>

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">{{trans('header.visit.table');}}</div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Gydytojas</th>
                    <th>Tikslas</th>
                    <th>Pokalbis</th>
                    <th>Kompetitoriai</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody >
            @foreach($items as $item)
            <tr>
                <td>
                    {{{ $item->doctor->fullname }}}
                </td>
                <td>
                    {{{ $item->tikslas}}}
                </td>
                <td class="col-sm-6">
                    <div style="height: 60px; overflow: hidden;" >{{{ $item->pokalbis}}}</div>
                </td>
                <td class="col-sm-2">
                    {{{ $item->kompetitoriai}}}
                </td>
                <td>
                    {{{ $item->data }}}
                </td>
                <td class="text-right">
                    <a
                        class="btn btn-xs btn-primary" rel="tooltip" data-placement="top" title="Redaguoti" href="/visit/edit/{{$item->id}}">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a
                        onclick="return confirm('Ar tikrai norite pašalinti apsilankymą?')"
                        class="btn btn-xs btn-danger" rel="tooltip" data-placement="top" title="Redaguoti" href="/visit/remove/{{$item->id}}">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <p>  {{ $items->links() }} </p>
    <a href="/visit/add" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span> Pridėti naują</a>

@stop