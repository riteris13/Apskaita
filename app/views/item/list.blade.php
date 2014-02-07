@extends('layout.core')

@section('content')


<div class="panel panel-default">
    <div class="panel-heading">Produktų paieška</div>
</div>

    <div class="panel panel-default">
        <div class="panel-heading">Kategorijos {{{$items->first()->category->pavadinimas}}} produktų sąrašas</div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Kategorija</th>
                <th>Pavadinimas</th>
                <th>Kodas</th>

                @foreach($items->first()->category->fields as $field)
                <th>{{{ucfirst($field->atributas) }}}</th>
                @endforeach
                <th>Kaina</th>
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
                @foreach($items->first()->category->fields as $field)
                <td>{{{ $item->{$field->atributas} }}}</td>
                @endforeach
                <td>
                    {{{ $item->kaina}}}
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <p>  {{ $items->links() }} </p>
@stop