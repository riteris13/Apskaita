<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

    <title>PVM sąskaita faktūra</title>

    <link rel='stylesheet' type='text/css' href='/css/invoice.style.css' />
    <link rel='stylesheet' type='text/css' href='/css/invoice.print.css' media="print" />
    <script type='text/javascript' src='/js/jquery-1.3.2.min.js'></script>
    <script type='text/javascript' src='/js/invoice.js'></script>

</head>

<body>

<div id="page-wrap">
    <div id="header">
        <textarea id="first-box"></textarea>
        <textarea id="title">PVM Sąskaita faktūra</textarea>


        <div id="right-box">
            <textarea id="number"> Nr.</textarea>
            <textarea id="original">Originalas</textarea>
            <div id="date-field">
                <textarea style="width: 100px;">{{(" \n");}}Išdavimo data: </textarea>
                <textarea style="width: 140px;" id="date">data </textarea>
            </div>
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
        <?php
        if(!isset($products)){$products = array();}
        foreach($products as $product){
           echo( '<tr class="item-row">
                <td id="table-nr"><span class="nr"> </span></td>
                <td class="item-name"><textarea id="table-name">'.$product['produktas'].'</textarea>
                <td><textarea id="table-qty" class="qty">'.$product['kiekis'].'</textarea></td>
                <td><textarea id="table-mes">matas</textarea></td>
                <td><textarea id="table-vat">21%</textarea></td>
                <td><textarea id="table-cost" class="cost">'.$product['pir_kaina'].'</textarea></td>
                <td class="item-price"> <span class="price">650.00</span><div class="delete-wpr"><a class="delete" href="javascript:;" title="Pašalinti eilutę">X</a></div></td>
            </tr>');
        }
        ?>

        <tr id="hiderow">
            <td colspan="7"><a id="addrow" href="javascript:;" title="Pridėti tuščią eilutę">Pridėti eilutę</a></td>
        </tr>
            <td colspan="5" class="blank"> </td>
            <td class="total-line">Viso:</td>
            <td class="total-value"><div id="total">650.00</div></td>
        </tr>

    </table>

    <div id="total-line2">
    <span style="font-weight: bold;">Viso apmokėjimui: </span><textarea style="font-weight: bold; text-align: right; height: 18px;position: relative; top: 4px;"> LTL</textarea>
    </div>
    <div id="total-line3">
        <span style="font-weight: bold;">Suma žodžiais:  </span><textarea style="height: 18px;position: relative; top: 4px;"> litų ir 00 ct</textarea>
    </div>

    <div id="invoice-info">
        <div id="reciever">
            <textarea id="invoice-inft">{{(" \n\n\n");}}Sąskaitą priėmė: </textarea>
        </div>
        <div id="giver">
            <textarea id="invoice-inft">{{(" \n\n\n");}}Sąskaitą išrašė: </textarea>
        </div>
    </div>
    <br>
</div>

</body>

</html>