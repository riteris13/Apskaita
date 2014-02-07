@extends('layout.core')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Gydytojų sąrašas</div>
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
                <td class="text-right">
                    <a onclick="return confirm('Ar tikrai norite pašalinti kliniką?')" class="btn btn-xs btn-danger" href="/doctor/remove/{{$item->id}}">Pašalinti</a>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <p>  {{ $items->links() }} </p>
    <a href="/doctor/add" class="btn btn-primary" >Pridėti naują</a>

@stop