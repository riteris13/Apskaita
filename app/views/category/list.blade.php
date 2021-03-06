@extends('layout.core')

<?php $header = trans('header.category.list'); ?>

@section('content')

    <script type="text/javascript" src="/js/jquery.tablesorter.min.js"></script>
    <link rel="stylesheet" href="/css/style.tablesorter.css">
    <div class="panel panel-default">
        <div class="panel-heading">{{trans('header.category.table');}}</div>
        <table id="sortable" class="table table-hover tablesorter">
            <thead>
            <tr>
                <th>{{{trans('table.name')}}}</th>
                <th>{{{trans('table.attribute')}}}</th>
            </tr>
            </thead>
            <tbody >
                @foreach($items as $item)
                  <tr>
                      <td>
                         {{{ $item->pavadinimas}}}
                      </td>
                      <td>
                          @foreach($item->fields as $field)
                          {{{ $field->atributas}}}
                          @endforeach
                      </td>
                      <td class="text-right">
                          @if($item->products()->count() == 0)
                            <a
                                onclick="return confirm('Ar tikrai norite pašalinti kategoriją?')"
                                class="btn btn-xs btn-danger" rel="tooltip" data-placement="top" title="{{{trans('table.del')}}}" href="/category/remove/{{$item->id}}">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                         @else
                            <a
                                class=" btn btn-xs btn-danger disabled"
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
    <a href="/category/add" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span> {{{trans('table.add')}}}</a>

    <script>
        $(document).ready(function()
            {
                $("#sortable").tablesorter();
            }
        );
    </script>

@stop