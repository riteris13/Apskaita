@extends('layout.core')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Klientų sąrašas</div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Vardas</th>
                <th>Pavardė</th>
                <th>Klinika</th>
            </tr>
            </thead>
            <tbody >
            @foreach($items as $item)
            <tr>
                <td>
                    {{{ $item->vardas }}}
                </td>
                <td>
                    {{{ $item->pavarde }}}
                </td>
                <td>
                    {{{ $item->clinic->pavadinimas }}}
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <p>  {{ $items->links() }} </p>
    <a href="/doctor/add" class="btn btn-primary" >Pridėti naują</a>

@stop