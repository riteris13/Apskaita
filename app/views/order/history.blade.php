@extends('layout.core')

<?php $header = trans('header.order.listH'); ?>

@section('content')
<script type="text/javascript" src="/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="/js/order.js"></script>

<div class="panel panel-default">
    <div class="panel-heading">{{trans('header.order.table');}}</div>
    <table class="table table-hover">
        <thead >
        <tr>
            <th>Užsakovas</th>
            <th>Klinika</th>
            <th>Data</th>
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
                        data-toggle="modal" data-target="#aprasymas" id="aprasymas-btn">
                    <span class="glyphicon glyphicon-search"></span>
                </button>

            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
<p>  {{ $items->links() }} </p>
<a href="/order" class="btn btn-primary" ><span class="glyphicon glyphicon-folder-open"></span>
    Užsakymai</a>


<div class="modal fade" id="aprasymas" tabindex="-1" role="dialog" aria-labelledby="aprasymas" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Užsakymo aprašymas</h4>
            </div>
            <div class="modal-body" id="modal-body">
                <table  class="table table-hover" >
                    <thead>
                    <th>Produktas</th>
                    <th>Kaina vnt.</th>
                    <th>Kiekis</th>
                    <th>Suma</th>
                    </thead>
                    <tbody id = "modalTable">

                    </tbody>
                </table>
                <h4 id="bendra_suma"> </h4>
            </div>
        </div>
    </div>
</div>


@stop