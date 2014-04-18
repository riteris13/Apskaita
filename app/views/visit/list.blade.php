@extends('layout.core')

<?php $header = trans('header.visit.list'); ?>

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Apsilankymų sąrašas</div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Tikslas</th>
                    <th>Pokalbis</th>
                    <th>Kompetitoriai</th>
                </tr>
            </thead>
            <tbody >
            @foreach($items as $item)
            <tr>
                <td>
                    {{{ $item->tikslas}}}
                </td>
                <td>
                    {{{ $item->pokalbis}}}
                </td>
                <td>
                    {{{ $item->kompetitoriai}}}
                </td>
                <td class="text-right">
                    <a
                        class="btn btn-xs btn-primary" href="/visit/edit/{{$item->id}}">
                        <span class="glyphicon glyphicon-pencil"></span> Redaguoti
                    </a>
                    <a
                        onclick="return confirm('Ar tikrai norite pašalinti apsilankymą?')"
                        class="btn btn-xs btn-danger" href="/visit/remove/{{$item->id}}">
                        <span class="glyphicon glyphicon-remove"></span> Pašalinti
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