@extends('layout.core')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Ataskaitų tipai</div>
    <table class="table table-hover">
        <tbody>
            <tr>
            <td>Kliento nuolaida ir potencialas</td>
            <td class="text-right">
                 <a href="/report/ao" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span> Generuoti naują</a>
            </td>
            </tr>

            <tr>
            <td>Išlaidos</td>
            <td class="text-right">
                <a href="/report/expenses" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span> Sudaryti</a>
            </td>
            </tr>

        </tbody>


    </table>


@stop