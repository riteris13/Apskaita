@extends('layout.core')

<?php $header = trans('header.category.list'); ?>

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">{{trans('header.category.table');}}</div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Pavadinimas</th>
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
                                class="btn btn-xs btn-danger" rel="tooltip" data-placement="top" title="Pašalinti" href="/category/remove/{{$item->id}}">
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
    <a href="/category/add" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span> Pridėti naują</a>

@stop