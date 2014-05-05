@extends('layout.core')

<?php $header = trans('header.doctor.list'); ?>

@section('content')
<script type="text/javascript" src="/js/doctorDetails.js"></script>

    <div class="panel panel-default">
        <div class="panel-heading">{{trans('header.doctor.table');}}</div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>{{{trans('table.fName')}}}</th>
                <th>{{{trans('table.clinic')}}}</th>
                <th>{{{trans('table.pot')}}}</th>
                <th>{{{trans('table.discount')}}}</th>
                <th>{{{trans('table.score')}}}</th>
            </tr>
            </thead>
            <tbody >
            @foreach($items as $item)
            <tr>
                <td>
                    {{{ $item->fullname }}}
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
                <td>
                    {{{ $item->ivertinimas }}}
                </td>
                <td class="text-right">
                    <button class="btn btn-xs btn-primary" onClick = "getDoctorDetails({{$item->id}})"
                            data-toggle="modal"  data-target="#aprasymas" id="aprasymas-btn"
                            data-keyboard="false" data-backdrop="static">
                        <span class="glyphicon glyphicon-search" rel="tooltip" data-placement="top" title="{{{trans('table.viewDoc')}}}"></span>
                    </button>
					<a
						class="btn btn-xs btn-primary" rel="tooltip" data-placement="top" title="{{{trans('table.edit')}}}" href="/doctor/edit/{{$item->id}}">
						<span class="glyphicon glyphicon-pencil"></span>
					</a>
                    <a
                        onclick="return confirm('Ar tikrai norite pašalinti gydytoją?')"
                        class="btn btn-xs btn-danger" rel="tooltip" data-placement="top" title="{{{trans('table.del')}}}" href="/doctor/remove/{{$item->id}}">
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <p>  {{ $items->links() }} </p>
    <a href="/doctor/add" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span> {{{trans('table.add')}}}</a>

<div class="modal fade" id="aprasymas" tabindex="-1" role="dialog" aria-labelledby="aprasymas" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title" style="text-align: center" id="myModalLabel">{{{trans('table.docDesc')}}}</h3>
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