@extends('layout.core')

@section('content')

@if(($fail == 'true'))
    <div class="alert alert-danger">
        Jūsų pasirinktoje kategorijoje prekių nėra. Rodomas visas sąrašas.
    </div>
@endif
<div class="panel panel-default">
    <div class="panel-heading">Produktų paieška</div>
    {{ Form::open(array('url' => 'item', 'class'=>'form-default')) }}
    <h4>Kategorija</h4>
    {{Form::select('id', Category::lists('pavadinimas', 'id')); }}
    <br>
    <br>
    {{Form::submit('Pasirinkti', array('class'=>'btn btn-primary')); }}

    {{ Form::close() }}
</div>

    <div class="panel panel-default">
        @if(($fail == 'true'))
            <div class="panel-heading">Visų kategorijų produktų sąrašas</div>
            @elseif(($fail == 'first'))
                <div class="panel-heading">Visų kategorijų produktų sąrašas</div>

            @elseif(($fail == 'false'))
                <div class="panel-heading">Kategorijos {{{$items->first()->category->pavadinimas}}} produktų sąrašas</div>

        @endif

        <table class="table table-hover">
            <thead>
            <tr>
                <th>Kategorija</th>
                <th>Pavadinimas</th>
                <th>Kodas</th>

                @if(($fail == 'false'))
                    @foreach($items->first()->category->fields as $field)
                    <th>{{{ucfirst($field->atributas) }}}</th>
                    @endforeach
                @endif
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
                @if(($fail == 'false'))
                    @foreach($items->first()->category->fields as $field)
                    <td>{{{ $item->{$field->atributas} }}}</td>
                    @endforeach
                @endif
                <td>
                    {{{ $item->kaina}}}
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <p>  {{ $items->links() }} </p>
	<a href="/item/select" class="btn btn-primary" > <span class="glyphicon glyphicon-plus"></span> Pridėti naują</a>
@stop