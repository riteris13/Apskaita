<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

    <title>Editable Invoice</title>

    <link rel='stylesheet' type='text/css' href='css/invoice.style.css' />
    <link rel='stylesheet' type='text/css' href='css/invoice.print.css' media="print" />
    <script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
    <script type='text/javascript' src='js/invoice.js'></script>

</head>

<body>

<div id="page-wrap">
    <div id="header">
        <textarea id="first-box"></textarea>
        <textarea id="title">PVM Sąskaita faktūra</textarea>


        <div id="right-box">
            <textarea id="number"> Nr.</textarea>
            <textarea id="original">Originalas</textarea>
            <textarea id="date-field">{{(" \n");}}Išdavimo data: </textarea>
        </div>

        <textarea id="date-place">Sąskaitos išrašymo data ir vieta: </textarea>
    </div>
    <div id="parties-info">
        <div id="seller">
            <textarea id="address">{{(" \n");}}Pardavėjas:{{(" \n");}}Adresas:{{(" \n");}}Įmonės kodas:{{(" \n");}}PVM mokėtojo kodas:{{(" \n");}}Telefonas:{{(" \n");}}Fax:{{(" \n");}}El. paštas:</textarea>
        </div>
        <div id="buyer">
            <textarea id="address">{{(" \n");}}Pirkėjas:{{(" \n");}}Adresas:{{(" \n");}}Įmonės kodas:</textarea>
        </div>
    </div>

    <table id="items">

        <tr>
            <th>Item</th>
            <th>Description</th>
            <th>Unit Cost</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>

        <tr class="item-row">
            <td class="item-name"><div class="delete-wpr"><textarea>Web Updates</textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>
            <td class="description"><textarea>Monthly web updates for http://widgetcorp.com (Nov. 1 - Nov. 30, 2009)</textarea></td>
            <td><textarea class="cost">$650.00</textarea></td>
            <td><textarea class="qty">1</textarea></td>
            <td><span class="price">$650.00</span></td>
        </tr>

        <tr class="item-row">
            <td class="item-name"><div class="delete-wpr"><textarea>SSL Renewals</textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>
            <td class="description"><textarea>{{Doctor::first()->vardas}}</textarea></td>
            <td><textarea class="cost">$75.00</textarea></td>
            <td><textarea class="qty">3</textarea></td>
            <td><span class="price">$225.00</span></td>
        </tr>

        <tr id="hiderow">
            <td colspan="5"><a id="addrow" href="javascript:;" title="Add a row">Add a row</a></td>
        </tr>

        <tr>
            <td colspan="2" class="blank"> </td>
            <td colspan="2" class="total-line">Subtotal</td>
            <td class="total-value"><div id="subtotal">$875.00</div></td>
        </tr>
        <tr>

            <td colspan="2" class="blank"> </td>
            <td colspan="2" class="total-line">Total</td>
            <td class="total-value"><div id="total">$875.00</div></td>
        </tr>
        <tr>
            <td colspan="2" class="blank"> </td>
            <td colspan="2" class="total-line">Amount Paid</td>

            <td class="total-value"><textarea id="paid">$0.00</textarea></td>
        </tr>
        <tr>
            <td colspan="2" class="blank"> </td>
            <td colspan="2" class="total-line balance">Balance Due</td>
            <td class="total-value balance"><div class="due">$875.00</div></td>
        </tr>

    </table>

    <div id="terms">
        <h5>Terms</h5>
        <textarea>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>
    </div>

</div>

</body>

</html>