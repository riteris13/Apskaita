@extends('layout.core')

<?php $header = trans('header.visit.list'); ?>

@section('content')
<script type="text/javascript" src="/js/visitDetails.js"></script>

    <div class="panel panel-default">
        <div class="panel-heading">{{trans('header.visit.table');}}</div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>{{{trans('table.fName')}}}</th>
                    <th>{{{trans('table.purp')}}}</th>
                    <th>{{{trans('table.date')}}}</th>
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
                <td>
                    {{{ $item->data }}}
                </td>
                <td class="text-right">
                    <button class="btn btn-xs btn-primary" onClick = "getVisitDetails({{$item->id}})"
                            data-toggle="modal"  data-target="#aprasymas" id="aprasymas-btn"
                            data-keyboard="false" data-backdrop="static">
                        <span class="glyphicon glyphicon-search" rel="tooltip" data-placement="top" title="{{{trans('table.viewVisit')}}}"></span>
                    </button>
                    <a
                        class="btn btn-xs btn-primary" rel="tooltip" data-placement="top" title="{{{trans('table.edit')}}}" href="/visit/edit/{{$item->id}}">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    <a
                        onclick="return confirm('Ar tikrai norite pašalinti apsilankymą?')"
                        class="btn btn-xs btn-danger" rel="tooltip" data-placement="top" title="{{{trans('table.del')}}}" href="/visit/remove/{{$item->id}}">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <p>  {{ $items->links() }} </p>
    <a href="/visit/add" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span>{{{trans('table.add')}}}</a>

<div class="modal fade" id="aprasymas" tabindex="-1" role="dialog" aria-labelledby="aprasymas" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title" style="text-align: center" id="myModalLabel">{{{trans('table.visitDesc')}}}</h3>
            </div>
            <div class="modal-body" id="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{{trans('table.close')}}}</button>
            </div>
        </div>
    </div>
</div>

@stop