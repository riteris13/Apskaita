@extends('layout.core')

<?php $header = trans('header.item.list'); ?>

@section('content')

    <script type="text/javascript" src="/js/jquery.tablesorter.min.js"></script>
    <link rel="stylesheet" href="/css/style.tablesorter.css">

    <div class="panel panel-default">
        <div style=" height: 40px; font-size: 18px" class="panel-heading">{{trans('table.search');}}</div>
        <table class="table table-default">
            {{ Form::open(array('url' => 'item', 'class'=>'form-default')) }}
            <tr>
                <td style="font-weight: bold; vertical-align: middle">{{{trans('table.cat')}}}</td>
                <?php
                $list = Category::lists('pavadinimas', 'id');
                $list = ["default"=> trans('table.all')]+$list;
                ?>
                <td>{{Form::select('id', $list, '', array('class'=>'form-control')); }}</td>
                <td style="font-weight: bold; vertical-align: middle">{{{trans('table.code')}}}</td>
                <td>{{Form::text('kodas', '', array('class'=>'form-control', 'type'=>'text')); }}</td>
                <td style="width: 30%"></td>
                <td>{{Form::submit(trans('table.search'), array('class'=>'btn btn-primary')); }}</td>
                {{ Form::close() }}
            </tr>
        </table>
    </div>

    <div class="panel panel-default">
        @if(($fail == 'true'))
            <div class="panel-heading">{{{trans('table.allCatList')}}}</div>
            @elseif(($fail == 'first'))
                <div class="panel-heading">{{{trans('table.allCatList')}}}</div>

            @elseif(($fail == 'false'))
                <div class="panel-heading">{{{trans('table.proList')}}} {{{$items->first()->category->pavadinimas}}} </div>

        @endif

        <table id="sortable" class="table table-hover tablesorter">
            <thead>
            <tr>
                <th>{{{trans('table.cat')}}}</th>
                <th>{{{trans('table.name')}}}</th>
                <th>{{{trans('table.code')}}}</th>

                @if(($fail == 'false'))
                    @foreach($items->first()->category->fields as $field)
                    <th>{{{ucfirst($field->atributas) }}}</th>
                    @endforeach
                @endif
                <th>{{{trans('table.price')}}}</th>
                <th>{{{trans('table.discount')}}}</th>
            </tr>
            </thead>
            <tbody >
            @foreach($items as $item)
            <tr>
                <td>
                    {{{ $item->category->pavadinimas}}}
                </td>
                <td>
                    {{{ $item->pavadinimas}}}
                </td>
                <td>
                    {{{ $item->kodas}}}
                </td>
                @if(($fail == 'false'))
                    @foreach($items->first()->category->fields as $field)
                    <td>{{{ $item->{$field->atributas} }}}</td>
                    @endforeach
                @endif
                <td>
                    {{{ $item->kaina}}}
                </td>
                <td>
                    {{{ $item->nuolaida}}}
                </td>
                <td class="text-right">
                    <a
                        class="btn btn-xs btn-primary" rel="tooltip" data-placement="top" title="{{{trans('table.edit')}}}" href="/item/edit/{{$item->id}}">
                        <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    @if($item->orders()->count() == 0)
                    <a
                        onclick="return confirm('Ar tikrai norite pašalinti produktą?')"
                        class="btn btn-xs btn-danger" rel="tooltip" data-placement="top" title="{{{trans('table.del')}}}" href="/item/remove/{{$item->id}}">
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
	<a href="/item/select" class="btn btn-primary" > <span class="glyphicon glyphicon-plus"></span> {{{trans('table.add')}}}</a>
    <script>
        $(document).ready(function()
            {
                $("#sortable").tablesorter();
            }
        );
    </script>
@stop