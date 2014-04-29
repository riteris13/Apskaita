@extends('layout.core')

<?php $header = trans('header.clinic.list'); ?>

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">{{trans('header.clinic.table');}}</div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Pavadinimias</th>
                <th>Adresas</th>
                <th>PVM mokėtojas</th>
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
                    class="btn btn-xs btn-primary" href="/clinic/edit/{{$item->id}}">
                    <span class="glyphicon glyphicon-pencil"></span> Redaguoti
                </a>

                    @if($item->doctors()->count() == 0)
                        <a
                            onclick="return confirm('Ar tikrai norite pašalinti kliniką?')"
                            class="btn btn-xs btn-danger" href="/clinic/remove/{{$item->id}}">
                            <span class="glyphicon glyphicon-remove"></span> Pašalinti
                        </a>
                    @else
                        <a
                            class=" btn btn-xs btn-danger disabled"
                            href="#">
                            <span class="glyphicon glyphicon-remove"></span> Pašalinti
                        </a>
                    @endif
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <p>  {{ $items->links() }} </p>
    <a href="/clinic/add" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span> Pridėti naują</a>
@stop