@extends('layout.core')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Klinikų sąrašas</div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Pavadinimias</th>
            <th>Adresas</th>
            <th>PVM</th>
        </tr>
        </thead>
        <tbody >
        @foreach($items as $item)
        <tr>
            <td>
                {{{ $item->pavadinimas}}}
            </td>
            <td>
                {{{ $item->adresas}}}
            </td>
            <td>
                @if($item->vat == 1) PVM mokėtojas
                @elseif($item->vat == 0) Ne PVM mokėtojas
                @endif
            </td>
            <td class="text-right">
                @if($item->doctors()->count() == 0)
                <a onclick="return confirm('Ar tikrai norite pašalinti kliniką?')" class="btn btn-xs btn-danger" href="/clinic/remove/{{$item->id}}">Pašalinti</a>
                @else
                <a alt="Ši kategorija turi produktų. Pirma pašalinkite juos." class=" btn btn-xs btn-danger disabled" href="#">Pašalinti</a>
                @endif
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
</div>
<p>  {{ $items->links() }} </p>
<a href="/clinic/add" class="btn btn-primary" >Pridėti naują</a>
@stop