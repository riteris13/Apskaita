@extends('layout.core')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading"> AO </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Doctors</th>
                <th>Discount</th>
                <th>Potenciality</th>
            </tr>
        </thead>

        <tbody>
            @foreach($doctors as $item)
            <tr>
                <td>
                    {{{ $item->fullname }}}
                </td>
                <td>
                    {{{ $item->nuolaida }}}
                </td>
                <td>
                    {{{ $item->potencialumas }}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div>
    <a href="/export/xls/ao" class="btn btn-primary" >Export XLS</a>
    <a href="/export/pdf/ao" class="btn btn-primary" >Export PDF</a>
</div>

@stop
