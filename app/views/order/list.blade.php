@extends('layout.core')

<?php $header = trans('header.order.list'); ?>

@section('content')
<script type="text/javascript" src="/js/orderDetails.js"></script>

<div class="panel panel-default">
    <div class="panel-heading">{{{trans('table.orderSort')}}}</div>
    {{ Form::open(array('url' => 'order', 'class'=>'form-default')) }}
    <h4>{{{trans('table.status')}}}</h4>
    {{Form::select('status', array('2' => trans('table.all'), '1' => trans('table.comp'), '0' => trans('table.inComp')), null, array('class'=>'form-control')); }}
    <br>
    {{Form::submit(trans('table.sort'), array('class'=>'btn btn-primary')); }}

    {{ Form::close() }}
</div>
    <div class="panel panel-default">
        <div class="panel-heading">{{trans('header.order.table');}}</div>
        <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{{trans('table.client')}}}</th>
                        <th>{{{trans('table.clinic')}}}</th>
                        <th>{{{trans('table.date')}}}</th>
                        <th>{{{trans('table.status')}}}</th>
                        <th class="text-center">{{{trans('table.size')}}}</th>
                      </tr>
                  </thead>

                  <tbody >
                  @foreach($items as $item)
                  @if ( $item->statusas == 1)
                      <tr bgcolor = "#B2FFB2">
                  @else
                      <tr bgcolor = "#FFFFB2">
                  @endif
                          <td>
                              {{{ $item->doctor->fullname}}}
                          </td>
                          <td>
                              {{{ $item->doctor->clinic->pavadinimas}}}
                          </td>
                      <td>
                          {{{ $item->data}}}
                      </td>
                      @if ( $item->statusas == 1)
                      <td class="col-sm-1">
                          {{{trans('table.comp')}}}
                      </td>
                      @else
                      <td class="col-sm-1">
                          {{{trans('table.inComp')}}}
                      </td>
                      @endif
                      <td class="col-sm-1 text-center">
                          {{{ $item->orders()->count() }}}
                      </td>
                        <td class="col-sm-2 text-right">
                            <button class="btn btn-xs btn-primary"
                                    value = "{{{trans('table.orderTotal')}}}"
                                    onClick = "getDetails({{$item->id}})"
                                    data-toggle="modal"  data-target="#aprasymas" id="aprasymas-btn"
                                    data-keyboard="false" data-backdrop="static">
                            <span class="glyphicon glyphicon-search" rel="tooltip" data-placement="top" title="{{{trans('table.viewOrder')}}}"></span>
                            </button>
                            @if ( $item->statusas == 0)
                            <a
                                onclick="return confirm('Ar tikrai norite norite pakeisti užsakymo statusą?')"
                                class="btn btn-xs btn-primary" href="/order/status/{{$item->id}}">
                                <span class="glyphicon glyphicon-thumbs-up" rel="tooltip" data-placement="top" title="{{{trans('table.compOrder')}}}"> </span>
                            </a>
                            <a
                                class="btn btn-xs btn-primary" href="/order/edit/{{$item->id}}">
                                <span class="glyphicon glyphicon-pencil" rel="tooltip" data-placement="top" title="{{{trans('table.edit')}}}"></span>
                            </a>
                            @else
                            <a
                                onclick="return confirm('Ar tikrai norite norite pakeisti užsakymo statusą?')"
                                class="btn btn-xs btn-danger" href="/order/status/{{$item->id}}">
                                <span class="glyphicon glyphicon-thumbs-down" rel="tooltip" data-placement="top" title="{{{trans('table.cnlOrder')}}}"> </span>
                            </a>

                            @endif

                            @if ( $item->statusas == 0)
                            <a
                                onclick="return confirm('Ar tikrai norite pašalinti užsakymą?')"
                                class="btn btn-xs btn-danger" href="/order/remove/{{$item->id}}">
                                <span class="glyphicon glyphicon-trash" rel="tooltip" data-placement="top" title="{{{trans('table.del')}}}"></span>
                            </a>
                            @else
                            <a
                                onclick="return confirm('Ar tikrai norite norite archyvuoti užsakymą? \r (Archyve galima tik peržiūrėti užsakymus)')"
                                class="btn btn-xs btn-info" href="/order/archive/{{$item->id}}">
                                <span class="glyphicon glyphicon-briefcase" rel="tooltip" data-placement="top" title="{{{trans('table.toArch')}}}"></span>
                            </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
        </table>
    </div>
    <p>  {{ $items->links() }} </p>
    <a href="/order/add" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span>
        {{{trans('table.addOrder')}}}</a>
    <a href="/order/history" class="btn btn-primary" ><span class="glyphicon glyphicon-folder-open"></span>
        {{{trans('table.arch')}}}</a>

<div class="modal fade" id="aprasymas" tabindex="-1" role="dialog" aria-labelledby="aprasymas" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title" style="text-align: center" id="myModalLabel">{{{trans('table.orderDesc')}}}</h3>
            </div>
            <div class="modal-body" id="modal-body">
                <table  class="table table-hover" >
                    <thead>
                        <th>{{{trans('table.item')}}}</th>
                        <th>{{{trans('table.price')}}}</th>
                        <th>{{{trans('table.quan')}}}</th>
                        <th>{{{trans('table.total')}}}</th>
                    </thead>
                    <tbody id = "modalTable">

                    </tbody>
                </table>
                <h4 id="bendra_suma"></h4>
                <div class="modal-footer">
                    <button
                        type="button" class="btn btn-sm btn-primary" name="papildyti-btn">{{{trans('table.appOrder')}}}
                    </button>
                    <button
                        type="button" class="btn btn-sm btn-primary" data-dismiss="modal">{{{trans('table.close')}}}
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>

@stop