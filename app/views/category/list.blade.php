@extends('layout.core')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Kategorijų sąrašas</div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Pavadinimas</th>
            </tr>
            </thead>
            <tbody >
                @foreach($items as $item)
                  <tr>
                      <td>
                         {{{ $item->pavadinimas}}}
                      </td>
                      <td class="text-right">
                          @if($item->products()->count() == 0)
                          <a onclick="return confirm('Ar tikrai norite pašalinti kategoriją?')" class="btn btn-xs btn-danger" href="/category/remove/{{$item->id}}">Pašalinti</a>
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
    <a href="/category/add" class="btn btn-primary" >Pridėti naują</a>

@stop