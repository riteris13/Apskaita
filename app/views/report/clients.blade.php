@extends('layout.core')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Klientų sąrašas</div>
        <table class="table table-hover">
            <tbody >
            @foreach($doctors as $doctor)
            <tr>
                <td>
                    {{{ $doctor->vardas }}}
                </td>
                <td>
                    {{{ $doctor->pavarde }}}
                </td>
                <td>
                    {{{ $doctor->clinic->pavadinimas }}}
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    <p>  {{ $doctors->links() }} </p>

@stop