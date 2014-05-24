@extends('layout.core')

<?php $header = Doctor::find($items->first()->daktaras_id)->fullname.trans('header.item.notourlist'); ?>

@section('content')
<script type="text/javascript" src="/js/jquery.tablesorter.min.js"></script>
<link rel="stylesheet" href="/css/style.tablesorter.css">
<table id="sortable" class="table table-hover tablesorter">
    <thead>
    <tr>
        <th>{{{trans('table.cat')}}}</th>
        <th>{{{trans('table.name')}}}</th>
        <th>{{{trans('table.code')}}}</th>
    </tr>
    </thead>
    <tbody >
    @foreach($items as $item)
    <tr>
        <td>
            {{{ $item->product->category->pavadinimas}}}
        </td>
        <td>
            {{{ $item->product->pavadinimas}}}
        </td>
        <td>
            {{{ $item->product->kodas}}}
        </td>
        <td class="text-right">
            <a
                onclick="return confirm('Ar tikrai norite pašalinti produktą?')"
                class="btn btn-xs btn-danger" rel="tooltip" data-placement="top" title="{{{trans('table.del')}}}" href="/doctor/removenotourproduct/{{$item->id}}">
                <span class="glyphicon glyphicon-trash"></span>
            </a>
        </td>
    </tr>
    @endforeach

    </tbody>
</table>

<a href="/doctor/addnotourproduct" class="btn btn-primary" > <span class="glyphicon glyphicon-plus"></span> {{{trans('table.add')}}}</a>
<script>
    $(document).ready(function()
        {
            $("#sortable").tablesorter();
        }
    );
</script>
@stop