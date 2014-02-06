@extends('layout.core')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Apsilankymų sąrašas</div>
    <table class="table table-hover">
        <tbody >
        @foreach($items as $item)
        <tr>
            <td>
                {{{ $item->tikslas}}}
            </td>
            <td>
                {{{ $item->pokalbis}}}
            </td>
            <td>
				{{{ $item->kompetitoriai}}}
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
</div>
<p>  {{ $items->links() }} </p>
<a href="/visit/add" class="btn btn-primary" >Pridėti naują</a>
@stop