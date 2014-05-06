@extends('layout.core')

@section('content')

<table id="tblExport" class="table table-bordered">
    <tbody>
    <td>
        Doctor name:
    </td>
    <td>
        {{{ $doctor->fullname }}}
    </td>
    </tr>
    <td>
        Clinic name, address
    </td>
    <td>{{{ $doctor->clinic->pavadinimas }}}</td>
    </tbody>
</table>
@stop