@extends('layout.core')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Ataskaitų tipai</div>
    <table class="table table-hover">
        <tbody>
            <td>AO: Daktaras, potencialumas, nuolaida</td>

            <td class="text-right">
                 <a href="/report/ao" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span> Generuoti naują</a>
            </td>
        </tbody>

    </table>


@stop