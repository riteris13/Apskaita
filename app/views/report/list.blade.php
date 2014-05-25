@extends('layout.core')

<?php $header = trans('header.report.list'); ?>

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">{{trans('header.report.table');}}</div>
        <table class="table table-hover">
            <tbody>
                <tr>
                <td>{{trans('reports.ao')}}</td>
                <td class="text-right">
                     <a href="/report/ao" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span> {{trans('table.prepare')}}</a>
                </td>
                </tr>
                <tr>
                <td>{{trans('reports.expenses')}}</td>
                <td class="text-right">
                    <a href="/report/expenses" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span> {{trans('table.prepare')}}</a>
                </td>
                </tr>
                <td>{{trans('reports.custinfo')}}</td>
                <td class="text-right">
                    <a href="/report/custinfo" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span> {{trans('table.prepare')}}</a>
                </td>
                </tr>
                <td>{{trans('reports.doctorpurchases')}}</td>
                <td class="text-right">
                    <a href="/report/doctorpurchases" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span> {{trans('table.prepare')}}</a>
                </td>
                </tr>
                <td>{{trans('reports.visitreport')}}</td>
                <td class="text-right">
                    <a href="/report/selectvisit" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span> {{trans('table.prepare')}}</a>
                </td>
                </tr>
                <td>{{trans('reports.salesreport')}}</td>
                <td class="text-right">
                    <a href="/report/sales" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span> {{trans('table.prepare')}}</a>
                </td>
                </tr>
                </tr>
                <td>{{trans('reports.doctorreport')}}</td>
                <td class="text-right">
                    <a href="/report/selectdoctor" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span> {{trans('table.prepare')}}</a>
                </td>
                </tr>
            </tbody>
        </table>
    </div>

@stop