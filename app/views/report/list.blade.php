@extends('layout.core')

<?php $header = trans('header.report.list'); ?>

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">{{trans('header.report.table');}}</div>
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
                <td>Informacija apie kliento naudojamus gaminius</td>
                <td class="text-right">
                    <a href="/report/custinfo" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span> Sudaryti</a>
                </td>
                </tr>
                <td>Informacija apie kliento pirkimus</td>
                <td class="text-right">
                    <a href="/report/doctorpurchases" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span> Sudaryti</a>
                </td>
                </tr>
                <td>Ataskaita apie vizitą</td>
                <td class="text-right">
                    <a href="/report/selectvisit" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span> Sudaryti</a>
                </td>
                </tr>
                <td>Metinė pardavimų ataskaita</td>
                <td class="text-right">
                    <a href="/report/sales" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span> Sudaryti</a>
                </td>
                </tr>
                </tr>
                <td>Ataskaita apie gydytoją</td>
                <td class="text-right">
                    <a href="/report/selectdoctor" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span> Sudaryti</a>
                </td>
                </tr>
            </tbody>
        </table>
    </div>

@stop