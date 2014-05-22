@extends('layout.core')

<?php $header = trans('header.clinic.list'); ?>

@section('content')

    <script type="text/javascript" src="/js/jquery.tablesorter.min.js"></script>
    <link rel="stylesheet" href="/css/style.tablesorter.css">
    <div class="panel panel-default">
        <div class="panel-heading">{{trans('header.clinic.table');}}</div>
        <table id="sortable" class="table table-hover tablesorter">
            <thead>
            <tr>
                <th>{{{trans('table.name')}}}</th>
                <th>{{{trans('table.adr')}}}</th>
                <th>{{{trans('table.pvm')}}}</th>
            </tr>
            </thead>
            <tbody >
            @foreach($items as $item)
            <tr>
                <td>
                    {{{ $item->pavadinimas}}}
                </td>
                <td>
                    {{{ $item->adresas}}}
                </td>
                <td>
                    {{{ $item->vatPayer }}}
                </td>
                <td class="text-right">
                <a
                    class="btn btn-xs btn-primary" rel="tooltip" data-placement="top" title="{{{trans('table.edit')}}}" href="/clinic/edit/{{$item->id}}">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>

                    @if($item->doctors()->count() == 0)
                        <a
                            onclick="return confirm('Ar tikrai norite pašalinti kliniką?')"
                            class="btn btn-xs btn-danger" rel="tooltip" data-placement="top" title="{{{trans('table.del')}}}" href="/clinic/remove/{{$item->id}}">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    @else
                        <a
                            class=" btn btn-xs btn-danger  disabled"
                            href="#">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    @endif
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <p>  {{ $items->links() }} </p>
    <a href="/clinic/add" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span> {{{trans('table.add')}}}</a>
    <script>
        $(document).ready(function()
            {
                $("#sortable").tablesorter();
            }
        );
    </script>
@stop