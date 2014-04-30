@extends('layout.core')

<?php $header = trans('header.doctor.list'); ?>

@section('content')
<script type="text/javascript" src="/js/doctorDetails.js"></script>

    <div class="panel panel-default">
        <div class="panel-heading">{{trans('header.doctor.table');}}</div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Vardas Pavardė</th>
                <th>Klinika</th>
                <th>Potencialumas %</th>
                <th>Nuolaida %</th>
                <th>Ivertinimas</th>
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
                            data-toggle="modal"  data-target="#aprasymas" id="aprasymas-btn">
                        <span class="glyphicon glyphicon-search" rel="tooltip" data-placement="top" title="Peržiūrėti vizitą"></span>
                    </button>
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

<div class="modal fade" id="aprasymas" tabindex="-1" role="dialog" aria-labelledby="aprasymas" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title" style="text-align: center" id="myModalLabel">Gydytojo aprašymas</h3>
            </div>
            <div class="modal-body" id="modal-body">

            </div>
        </div>
    </div>
</div>

@stop