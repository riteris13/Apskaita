@extends('layout.core')
<?php
    $header = Doctor::find($id)->fullname.trans('header.item.notourlist');
?>

@section('content')
<script type="text/javascript" src="/js/jquery.tablesorter.min.js"></script>
<script type="text/javascript" src="/js/notOurProduct.js"></script>
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
<button class="btn btn-primary"
        data-toggle="modal"  data-target="#naujas" id="naujas-btn"
        data-keyboard="false" data-backdrop="static">
    <span class="glyphicon glyphicon-plus"></span> {{{trans('table.add')}}}
</button>
<div class="modal fade" id="naujas" tabindex="-1" role="dialog" aria-labelledby="naujas" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body" id="modal-body">
                {{ Form::open(array('url' => 'doctor/addnotourproduct', 'class'=>'form-default', 'id'=>'Addnotourproduct')) }}

                <h4>{{{trans('table.cat')}}}</h4>
                {{Form::select('kategorija_id', array('default' => 'Pasirinkite kategoriją') +
                Category::all()->lists('pavadinimas', 'id'), null, array('class'=>'form-control', 'id'=>'category')); }}

                <h4>{{{trans('table.item')}}}</h4>
                {{Form::select('produktas_id', array('default' => 'Pirmiausia pasirinkite kategoriją'), null,
                array('class'=>'form-control', 'id'=>'produktas', 'disabled' => 'true')); }}

                {{Form::hidden('daktaras_id', $id); }}

                <div class="modal-footer">
                    {{Form::submit(trans('table.addBtn'), array('class'=>'btn btn-primary', 'disabled' => 'disabled', 'id' => 'Submit')); }}
                    {{ Form::close() }}
                    <button
                        type="button" class="btn btn-primary" data-dismiss="modal">{{{trans('table.close')}}}
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    $(document).ready(function()
        {
            $("#sortable").tablesorter();
        }
    );
</script>
@stop