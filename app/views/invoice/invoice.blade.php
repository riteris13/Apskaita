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

    <div id="payment-info">
        <span>Apmokėjimo forma: </span><textarea id="payment-bold">pavedimas</textarea><span>Apmokėjimo terminas:</span>
        <textarea id="payment-bold" style="width: 100px;"> </textarea><span>Bankas: </span><textarea id="payment-bold">AB SEB Vilniaus bankas</textarea>
        <span>Atsiskaitomoji sąskaita: </span><textarea id="payment-bold">LT 75 7044 0600 0770 2100</textarea>
        <br><span>Valiuta: </span><textarea id="payment-bold">LTL</textarea>
    </div>

    <table id="items">

        <tr>
            <th>Eil. Nr.</th>
            <th>Pavadinimas</th>
            <th>Kiekis</th>
            <th>Mato vnt.</th>
            <th>PVM</th>
            <th>Kaina, LTL</th>
            <th>Suma, LTL</th>
        </tr>

        <tr class="item-row">
            <td class="item-number"><div class="delete-wpr"><textarea id="table-nr">1.</textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>
            <td class="item-name"><div class="delete-wpr"><textarea id="table-name">Web Updates</textarea>
            <td><textarea id="table-qty" class="qty">1</textarea></td>
            <td><textarea id="table-mes">matas</textarea></td>
            <td><textarea id="table-vat">PVM</textarea></td>
            <td><textarea id="table-cost" class="cost">$650.00</textarea></td>
            <td class="item-price"><span class="price">$650.00</span></td>
        </tr>

        <tr id="hiderow">
            <td colspan="7"><a id="addrow" href="javascript:;" title="Add a row">Add a row</a></td>
        </tr>
            <td colspan="5" class="blank"> </td>
            <td class="total-line">Viso:</td>
            <td class="total-value"><div id="total">$875.00</div></td>
        </tr>

    </table>

    <div id="terms">
        <h5>Terms</h5>
        <textarea>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>
    </div>

</div>

</body>

</html>