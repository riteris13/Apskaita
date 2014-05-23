@extends('layout.core')

<?php $header = trans('header.order.listH'); ?>

@section('content')
<script type="text/javascript" src="/js/orderDetails.js"></script>
<script type="text/javascript" src="/js/jquery.tablesorter.min.js"></script>
<link rel="stylesheet" href="/css/style.tablesorter.css">

<div class="panel panel-default">
    <div class="panel-heading">{{trans('header.order.table');}}</div>
    <table id="sortable" class="table table-hover tablesorter">
        <thead >
        <tr>
            <th>{{{trans('table.client')}}}</th>
            <th>{{{trans('table.clinic')}}}</th>
            <th>{{{trans('table.date')}}}</th>
        </tr>
        </thead>

        <tbody>
        @foreach($items as $item)
            <td>
                {{{ $item->doctor->fullname}}}
            </td>
            <td>
                {{{ $item->doctor->clinic->pavadinimas}}}
            </td>
            <td>
                {{{ $item->data}}}
            </td>
            <td class="col-sm-1 text-right">
                <button class="btn btn-xs btn-primary" onClick = "getDetails({{$item->id}})"
                        value = "{{{trans('table.orderTotal')}}}"
                        data-toggle="modal" data-target="#aprasymas" id="aprasymas-btn">
                    <span class="glyphicon glyphicon-search" rel="tooltip" data-placement="top" title="Peržiūrėti užsakymą"></span>
                </button>

            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
<p>  {{ $items->links() }} </p>
<a href="/order" class="btn btn-primary" ><span class="glyphicon glyphicon-folder-open"></span>
    {{{trans('table.orders')}}}</a>


<div class="modal fade" id="aprasymas" tabindex="-1" role="dialog" aria-labelledby="aprasymas" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title" style="text-align: center" id="myModalLabel">{{{trans('table.orderDesc')}}}</h3>
            </div>
            <div class="modal-body" id="modal-body">
                <table  class="table table-hover" >
                    <thead>
                    <th>{{{trans('table.item')}}}</th>
                    <th>{{{trans('table.price')}}}</th>
                    <th>{{{trans('table.quan')}}}</th>
                    <th>{{{trans('table.total')}}}</th>
                    </thead>
                    <tbody id = "modalTable">

                    </tbody>
                </table>
                <h4 id="bendra_suma"> </h4>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function()
        {
            $("#sortable").tablesorter();
        }
    );
</script>


@stop