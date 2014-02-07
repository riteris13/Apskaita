@extends('layout.core')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Produktų sąrašas</div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Kategorija</th>
                <th>Pavadinimas</th>
                <th>Kodas</th>
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
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <p>  {{ $items->links() }} </p>
@stop