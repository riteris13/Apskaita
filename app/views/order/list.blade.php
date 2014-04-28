@extends('layout.core')

<?php $header = trans('header.order.list'); ?>

@section('content')
<script type="text/javascript" src="/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="/js/order.js"></script>

<div class="panel panel-default">
    <div class="panel-heading">Užsakymų rūšiavimas</div>
    {{ Form::open(array('url' => 'order', 'class'=>'form-default')) }}
    <h4>Statusas</h4>
    {{Form::select('status', array('2' => 'Visi', '1' => 'Įvykdyti', '0' => 'Neįvykdyti'), null, array('class'=>'form-control')); }}
    <br>
    {{Form::submit('Rūšiuoti', array('class'=>'btn btn-primary')); }}

    {{ Form::close() }}
</div>
    <div class="panel panel-default">
        <div class="panel-heading">Užsakymų sąrašas</div>
        <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Užsakovas</th>
                        <th>Klinika</th>
                        <th>Data</th>
                        <th>Statusas</th>
                        <!--  <th>Produktas</th>
                          <th>Kaina vnt.</th>
                          <th>Kiekis</th>
                          <th>Suma</th>
                          -->
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
                          {{"Įvykdytas"}}
                      </td>
                      @else
                      <td class="col-sm-1">
                          {{"Neįvykdytas"}}
                      </td>
                      @endif
                      <!--
@foreach($item->orders as $order)

</tr>
<tr>
    <td>
        {{{ $order->product->pavadinimas}}}
    </td>
    <td>
        {{{ $order->pir_kaina}}}
    </td>
    <td>
        {{{ $order->kiekis}}}
    </td>
    <td>
        {{{ $order->pir_kaina * $order->kiekis}}}
    </td>
@endforeach
-->

                        <td class="col-sm-2 text-right">
                            <button class="btn btn-xs btn-primary" onClick = "getDetails({{$item->id}})" data-toggle="modal" data-target="#aprasymas" id="aprasymas-btn">
                            <span class="glyphicon glyphicon-search"></span>
                            </button>
                            <!--
                            <a
                                class="btn btn-xs btn-primary" >
                                <span class="glyphicon glyphicon-search"> </span>
                            </a>
                            -->
                            @if ( $item->statusas == 0)
                            <a
                                onclick="return confirm('Ar tikrai norite norite pakeisti užsakymo statusą?')"
                                class="btn btn-xs btn-primary" href="/order/status/{{$item->id}}">
                                <span class="glyphicon glyphicon-thumbs-up"> </span>
                            </a>
                            <a
                                class="btn btn-xs btn-primary" href="/order/edit/{{$item->id}}">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                            @else
                            <a
                                onclick="return confirm('Ar tikrai norite norite pakeisti užsakymo statusą?')"
                                class="btn btn-xs btn-danger" href="/order/status/{{$item->id}}">
                                <span class="glyphicon glyphicon-thumbs-down"> </span>
                            </a>

                            @endif

                            @if ( $item->statusas == 0)
                            <a
                                onclick="return confirm('Ar tikrai norite pašalinti užsakymą?')"
                                class="btn btn-xs btn-danger" href="/order/remove/{{$item->id}}">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                            @else
                            <a
                                onclick="return confirm('Ar tikrai norite norite archyvuoti užsakymą?')"
                                class="btn btn-xs btn-info" href="/order/archive/{{$item->id}}">
                                <span class="glyphicon glyphicon-briefcase"></span>
                            </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
        </table>
    </div>
    <p>  {{ $items->links() }} </p>
    <a href="/order/add" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span> Pridėti naują užsakymą</a>


<div class="modal fade" id="aprasymas" tabindex="-1" role="dialog" aria-labelledby="aprasymas" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Užsakymo aprašymas</h4>
            </div>
            <div class="modal-body" id="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


@stop