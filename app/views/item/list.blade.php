@extends('layout.core')

<?php $header = trans('header.item.list'); ?>
<? $sel = trans('table.sel');?>

@section('content')

    @if(($fail == 'true'))
        <div class="alert alert-danger">
            {{{trans('table.empCatTitle')}}}
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-heading">{{{trans('table.itemSearch')}}}</div>
        {{ Form::open(array('url' => 'item', 'class'=>'form-default')) }}
        <h4>{{{trans('table.cat')}}}</h4>
        {{Form::select('id', Category::lists('pavadinimas', 'id'), null, array('class'=>'form-control')); }}
        <br>
        {{Form::submit($sel, array('class'=>'btn btn-primary')); }}

        {{ Form::close() }}
    </div>

    <div class="panel panel-default">
        @if(($fail == 'true'))
            <div class="panel-heading">{{{trans('table.allCatList')}}}</div>
            @elseif(($fail == 'first'))
                <div class="panel-heading">{{{trans('table.allCatList')}}}</div>

            @elseif(($fail == 'false'))
                <div class="panel-heading">{{{trans('table.proList')}}} {{{$items->first()->category->pavadinimas}}} </div>

        @endif

        <table class="table table-hover">
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
@stop