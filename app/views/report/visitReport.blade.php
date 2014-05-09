@extends('layout.core')

@section('content')

<table id="tblExport" class="table table-bordered">
    <tbody>
    <tr>
        <td class="text-center" style="background-color: lightgray" colspan="4">
            {{{ $visit->data}}}
        </td>
    </tr>
    <tr>
        <td>
            Aim
        </td>
        <td>
            Conversation
        </td>
        <td>
            Order (psc)
        </td>
        <td>
            Competition
        </td>
    </tr>
    <tr>
        <td rowspan="5">
            {{{ $visit->tikslas }}}
        </td>
        <td>
            {{{ $visit->pokalbis }}}
        </td>
        <td>
            <table class="table table-bordered">
                <tr>
                    <td style="background-color: darkgray">
                        AO
                    </td>
                    <td style="background-color: darkgray"></td>
                </tr>
                <tr>
                    <td>
                        Brackets
                    </td>
                    <td>
                        Tubes
                    </td>
                    <td>
                        Bands
                    </td>
                    <td>
                        Wires
                    </td>
                </tr>
            </table>
        </td>
        <td>
            {{{ $visit->kompetitoriai }}}
        </td>
    </tr>
    </tbody>
</table>


@stop