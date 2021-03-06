<?php

class ExportController extends BaseController{

    public function getIndex(){
        $objPHPExcel = $this->prepareExcel("test");

// Add some data
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Hello')
            ->setCellValue('B2', 'world!')
            ->setCellValue('C1', 'Hello')
            ->setCellValue('D2', 'world!');

// Miscellaneous glyphs, UTF-8
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A4', 'Miscellaneous glyphs')
            ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');

        $this->downloadExcel($objPHPExcel,"test");
    }

    public function postIatc(){
        if(Input::get('PDF') == "Export PDF"){
            $this->getIATCpdf();
        }elseif(Input::get('XLS') == "Export XLS"){
            $this->getIATCxls();
        }
        else{
            return Redirect::to('report/expenses')->withErrors('Global error');
        }
    }
    public function postExpenses(){
        if(Input::get('PDF') == "Export PDF"){
            $this->getEXPENSESpdf();
        }elseif(Input::get('XLS') == "Export XLS"){
            $this->getEXPENSESxls();
        }
        else{
            return Redirect::to('report/custinfo')->withErrors('Global error');
        }
    }
    public function postSales(){
        if(Input::get('PDF') == "Export PDF"){
            $this->getSALESpdf();
        }elseif(Input::get('XLS') == "Export XLS"){
            $this->getSALESxls();
        }
        else{
            return Redirect::to('report/sales')->withErrors('Global error');
        }
    }
    public function postAo(){
        if(Input::get('PDF') == "Export PDF"){
            $this->getAOpdf();
        }elseif(Input::get('XLS') == "Export XLS"){
            $this->getAOxls();
        }
        else{
            return Redirect::to('report/ao')->withErrors('Global error');
        }
    }
    public function postPurchases(){
        if(Input::get('PDF') == "Export PDF"){
            $this->getPURCHASESpdf();
        }elseif(Input::get('XLS') == "Export XLS"){
            $this->getPURCHASESxls();
        }
        else{
            return Redirect::to('report/doctorpurchases')->withErrors('Global error');
        }
    }
    public function postDoctorreport(){
        if(Input::get('PDF') == "Export PDF"){
            $this->getDOCTORREPORTpdf();
        }elseif(Input::get('XLS') == "Export XLS"){
            $this->getDOCTORREPORTxls();
        }
        else{
            return Redirect::to('report/doctorpurchases')->withErrors('Global error');
        }
    }
    public function postVisitreport(){
        if(Input::get('PDF') == "Export PDF"){
            $this->getVISITpdf();
        }elseif(Input::get('XLS') == "Export XLS"){
            $this->getVISITxls();
        }
        else{
            return Redirect::to('report/visitreport/'.Input::get('id'))->withErrors('Global error');
        }
    }
    private  function getAOxls(){
        $input = Input::all();
        $objPHPExcel = $this->prepareExcel("AO");
        $i = 2;

        $objRichText = $this->getBold("Doctor");
        $objPHPExcel->getActiveSheet()->getCell("A1")->setValue($objRichText);

        $objRichText2 = $this->getBold("Discount");
        $objPHPExcel->getActiveSheet()->getCell("B1")->setValue($objRichText2);

        $objRichText3 = $this->getBold("Potenciality");
        $objPHPExcel->getActiveSheet()->getCell("C1")->setValue($objRichText3);

        $mi = new MultipleIterator();
        $mi->attachIterator(new ArrayIterator($input['name']));
        $mi->attachIterator(new ArrayIterator($input['disc']));
        $mi->attachIterator(new ArrayIterator($input['pot']));
        foreach($mi as $value){
            list($name, $disc, $pot) = $value;
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$i, $name)
                ->setCellValue('B'.$i, $disc)
                ->setCellValue('C'.$i, $pot);
            $i++;
        }

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);

        $this->downloadExcel($objPHPExcel,"AO");
    }

    private function getIATCxls()
    {
        $input = Input::all();
        $np = 0;
        $nnp = 0;
        $objPHPExcel = $this->prepareExcel("IATC");

        $objRichText = $this->getBold("Name, Surname");
        $objPHPExcel->getActiveSheet()->getCell("A1")->setValue($objRichText);
        $objRichText1 = $this->getBold("Which products he use from us");
        $objPHPExcel->getActiveSheet()->getCell("B1")->setValue($objRichText1);
        $objRichText2 = $this->getBold("Which pruducts from other company");
        $objPHPExcel->getActiveSheet()->getCell("C1")->setValue($objRichText2);
        $objRichText3 = $this->getBold("Why he doesn't use our products");
        $objPHPExcel->getActiveSheet()->getCell("D1")->setValue($objRichText3);
        $objRichText4 = $this->getBold("My idea to make this doctor our customer");
        $objPHPExcel->getActiveSheet()->getCell("E1")->setValue($objRichText4);

        $j = 2;

        for($i = 0; $i < count($input['names']); $i++){
            $objPHPExcel->getActiveSheet()->getCell('A'.$j)->setValue($input['names'][$i]);
            $pavadinimai = "";
            for($g = 0; $g < $input['pc'][$i]; $g++){
                if($input['products'][$np+$g] == ''){ continue;}
                $pavadinimai = $pavadinimai.''.$input['products'][$np+$g].'; ';
            }
            $np += $g;
                $objPHPExcel->getActiveSheet()->getCell('B'.$j)->setValue($pavadinimai);

            $pavadinimai = "";
            for($g = 0; $g < $input['npc'][$i]; $g++){
                if($input['nproducts'][$nnp+$g] == ''){ continue;}
                $pavadinimai = $pavadinimai.''.$input['nproducts'][$nnp+$g].'; ';
            }
            $nnp += $g;
            $objPHPExcel->getActiveSheet()->getCell('C'.$j)->setValue($pavadinimai);

            $objPHPExcel->getActiveSheet()->getCell('D'.$j)->setValue($input['neperka'][$i]);

            $objPHPExcel->getActiveSheet()->getCell('E'.$j)->setValue($input['pritraukti'][$i]);
            $j++;
        }

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);

        $this->downloadExcel($objPHPExcel,"Information_about_the_customers");

    }

    private function getBold($text)
    {
        $objRichText = new PHPExcel_RichText();
        $objTitle = $objRichText->createTextRun($text);
        $objTitle->getFont()->setBold(true);
        return $objRichText;
    }

    private function prepareExcel($title)
    {
        // Create new PHPExcel object
        $objPHPExcel = new PHPExcel();

        // Set document properties
        $objPHPExcel->getProperties()
            ->setCreator("Zikai")
            ->setLastModifiedBy("Zikai")
            ->setTitle($title)
            ->setSubject($title);
        return $objPHPExcel;
    }

    private function downloadExcel($objPHPExcel, $name)
    {
        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle($name);


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$name.'.xls"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }

    private function getAOpdf(){
        $html = '<html><head>
    <meta charset="utf-8"></head><body><div>
        <div style="text-align: center; font-weight: bold"> AO </div><br><div style="margin: 0 auto; width: 50%">
        <table border="1px solid" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th>Doctors</th>
                <th>Discount</th>
                <th>Potenciality</th>
            </tr>
        </thead>

        <tbody style="text-align: left">';
        $input = Input::all();
        $i = 0;
        for($i = 0; $i < count($input['name']); $i++){
            $html = $html.'<tr>
                <td style="text-align : left">'.$input['name'][$i].'</td>
                <td style="text-align : center">'.$input['disc'][$i].'</td>
                <td style="text-align : center">'.$input['pot'][$i].'</td>
            </tr>';
        };
        $html = $html.'</tbody>
        </table></div></div></body></html>';
        return PDF::load($html, 'A4', 'portrait')->download("AO");
    }

    private function getIATCpdf()
    {
        $input = Input::all();
        $np = 0;
        $nnp = 0;

        $html = '<html><head>
    <meta charset="utf-8"></head><body><div>
        <div style="text-align: center; font-weight: bold"> Information about the customers </div><br>
        <div style="margin: 0 auto; width: 90%">
        <table border="1px solid" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th style="width: 150px">Name, Surname</th>
                <th style="width: 130px">Which products she use from us</th>
                <th style="width: 120px">Which products from other company</th>
                <th style="width: 150px">Why she doesn\'t use our products</th>
                <th style="width: 133px">My idea to make this doctor our customer</th>
            </tr>
        </thead>

        <tbody>';
        for($i = 0; $i < count($input['names']); $i++){
            $html = $html.'<tr>
                <td>'.$input['names'][$i].'</td>';

            $html= $html.'<td>';
            for($g = 0; $g < $input['pc'][$i]; $g++){
                $html= $html.$input['products'][$np+$g].'; ';
            }
            $html= $html.'</td>';
            $np += $g;

            $html= $html.'<td>';
            for($g = 0; $g < $input['npc'][$i]; $g++){
                $html= $html.$input['nproducts'][$nnp+$g].'; ';
            }
            $html= $html.'</td>';
            $nnp += $g;

            $html= $html.'</td>

            <td>'.$input['neperka'][$i].'</td>
            <td>'.$input['pritraukti'][$i].'</td>
            </tr>';
        }
        $html = $html.'</tbody>
            </table></div></div></body></html>';
        return PDF::load($html, 'A4', 'landscape')->download("Information about customers");
    }
    private function getEXPENSESxls(){
        $input = Input::all();
        $objPHPExcel = $this->prepareExcel("Expenses");
        $i = 5;

        $objRichText = $this->getBold($input['data']);
        $objPHPExcel->getActiveSheet()->getCell("A1")->setValue($objRichText);

        $objRichText2 = $this->getBold("Name");
        $objPHPExcel->getActiveSheet()->getCell("A2")->setValue($objRichText2);

        $objRichText3 = $this->getBold("LTL");
        $objPHPExcel->getActiveSheet()->getCell("B3")->setValue($objRichText3);

        $objRichText4 = $this->getBold("Car expenses");
        $objPHPExcel->getActiveSheet()->getCell("A4")->setValue($objRichText4);

        foreach(array_combine($input['line-xs'], $input['input-xs']) as $line => $amount){
            if($i == 16 || $i == 22 || $i == 25 || $i == 28 || $i == 34 || $i == 41){
                if($i == 16){
                    $objRichText7 = $this->getBold("Office expenses/needs");
                    $objPHPExcel->getActiveSheet()->getCell("A".$i)->setValue($objRichText7);
                    $i++;
                }elseif($i == 22){
                    $objRichText7 = $this->getBold("Financial operations");
                    $objPHPExcel->getActiveSheet()->getCell("A".$i)->setValue($objRichText7);
                    $i++;
                }elseif($i == 25){
                    $objRichText7 = $this->getBold("Delivery services");
                    $objPHPExcel->getActiveSheet()->getCell("A".$i)->setValue($objRichText7);
                    $i++;
                }elseif($i == 28){
                    $objRichText7 = $this->getBold("Advertising/promo");
                    $objPHPExcel->getActiveSheet()->getCell("A".$i)->setValue($objRichText7);
                    $i++;
                }elseif($i == 34){
                    $objRichText7 = $this->getBold("Representation expenses");
                    $objPHPExcel->getActiveSheet()->getCell("A".$i)->setValue($objRichText7);
                    $i++;
                }elseif($i == 41){
                    $objRichText7 = $this->getBold("Traveling");
                    $objPHPExcel->getActiveSheet()->getCell("A".$i)->setValue($objRichText7);
                    $i++;
                }
            }
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$i, $line)
                ->setCellValue('B'.$i, $amount);
            $i++;
        }

        $objRichText5 = $this->getBold("Total expenses");
        $objPHPExcel->getActiveSheet()->getCell('A'.$i)->setValue($objRichText5);

        $objRichText6 = $this->getBold($input['total']);
        $objPHPExcel->getActiveSheet()->getCell('B'.$i)->setValue($objRichText6);

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);

        $this->downloadExcel($objPHPExcel,"Expenses");
    }
    private function getEXPENSESpdf(){
        $i = 0;
        $text['0'] = "Office expenses/needs";
        $text['1'] = "Financial operations";
        $text['2'] = "Delivery services";
        $text['3'] = "Advertising/promo";
        $text['4'] = "Representation expenses";
        $text['5'] = "Travelling";

        $input = Input::all();
        $html = '<html><head>
            <meta charset="utf-8"></head><body><div>
            <div style="text-align: center; font-weight: bold"></div><br>
            <div style="margin: 0 auto; width: 100%">
            '.$input['data'].'
            <table border="1px solid" style="border-collapse: collapse; width: 600px; text-align: left; font-size: 15px;">
            <tbody>
            <tr><td style="text-align: center; width: 70%;">Name</td>
                <td></td>
            </tr>
             <tr><td></td><td style="text-align: center;">LTL</td>
            </tr>
            <tr>
                <td style=" text-align: center; background-color: lightgray">Car Expenses</td>
                <td style="background-color: lightgray"></td>
            </tr>';

        foreach(array_combine($input['line-xs'], $input['input-xs']) as $line => $amount){
            if($i == 11 || $i == 16 || $i == 18 || $i == 20 || $i == 25 || $i == 31){
                $html = $html.'<tr>
                <td style=" text-align: center; background-color: lightgray">';
                    if($i == 11){
                        $html = $html.$text[0];
                    }
                    elseif($i == 16){
                        $html = $html.$text[1];
                    }
                    elseif($i == 18){
                        $html = $html.$text[2];
                    }
                    elseif($i == 20){
                        $html = $html.$text[3];
                    }
                    elseif($i == 25){
                        $html = $html.$text[4];
                    }
                    elseif($i == 31){
                        $html = $html.$text[5];
            }
                $html = $html.'</td>
                <td style="background-color: lightgray"></td>
                    </tr>';
            }
            $html = $html.'<tr>
                <td>'.$line.'</td>
                <td style=" text-align: center;">'.$amount.'</td></tr>';
            $i++;
        }
        $html = $html.'<tr><td style="font-weight: bold">Total expenses:</td>
            <td style="text-align:center">'.$input['total'].'</td></tr></tbody>
            </table></div></div></body></html>';

        return PDF::load($html, 'A4', 'portrait')->download("Expenses ".$input['data']);
    }
    private function getSALESxls(){
        $input = Input::all();
        $objPHPExcel = $this->prepareExcel("Sales");
        $i = 2;
        $j = 1;

        $objRichText = $this->getBold("Eil. Nr.");
        $objPHPExcel->getActiveSheet()->getCell("A1")->setValue($objRichText);

        $objRichText2 = $this->getBold("Prekės pavadinimas");
        $objPHPExcel->getActiveSheet()->getCell("B1")->setValue($objRichText2);

        $objRichText3 = $this->getBold("Kiekis");
        $objPHPExcel->getActiveSheet()->getCell("C1")->setValue($objRichText3);

        $objRichText4 = $this->getBold("Suma $ ir LT");
        $objPHPExcel->getActiveSheet()->getCell("D1")->setValue($objRichText4);

        $objRichText4 = $this->getBold("Užimama rinkos dalis");
        $objPHPExcel->getActiveSheet()->getCell("E1")->setValue($objRichText4);

        $mi = new MultipleIterator();
        $mi->attachIterator(new ArrayIterator($input['name']));
        $mi->attachIterator(new ArrayIterator($input['amount']));
        $mi->attachIterator(new ArrayIterator($input['dol']));
        $mi->attachIterator(new ArrayIterator($input['ltl']));
        $mi->attachIterator(new ArrayIterator($input['rinkos']));
        foreach($mi as $value){
            list($name, $amount, $dol, $ltl, $rinkos) = $value;
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$i, $j)
                ->setCellValue('B'.$i, $name)
                ->setCellValue('C'.$i, $amount)
                ->setCellValue('D'.$i, $dol.'$ '.$ltl.' LT')
                ->setCellValue('E'.$i, $rinkos);
            $i++;
            $j++;
        }

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);

        $this->downloadExcel($objPHPExcel,"Sales");
    }
    private function getPURCHASESxls(){
        $input = Input::all();
        $objPHPExcel = $this->prepareExcel("DoctorPurchases");
        $i = 2;
        $nb = 1;
        $n = 0;

        $objRichText = $this->getBold("Nb");
        $objPHPExcel->getActiveSheet()->getCell("A1")->setValue($objRichText);

        $objRichText2 = $this->getBold("Doctor name");
        $objPHPExcel->getActiveSheet()->getCell("B1")->setValue($objRichText2);

        $objRichText3 = $this->getBold("Clinic name");
        $objPHPExcel->getActiveSheet()->getCell("C1")->setValue($objRichText3);

        $objRichText4 = $this->getBold("Clinic address, VAT or clinic code");
        $objPHPExcel->getActiveSheet()->getCell("D1")->setValue($objRichText4);

        $objRichText4 = $this->getBold("What doctors are buying from us");
        $objPHPExcel->getActiveSheet()->getCell("E1")->setValue($objRichText4);

        $objRichText5 = $this->getBold("Sales in 2014");
        $objPHPExcel->getActiveSheet()->getCell("F1")->setValue($objRichText5);

        $mi = new MultipleIterator();
        $mi->attachIterator(new ArrayIterator($input['doctor']));
        $mi->attachIterator(new ArrayIterator($input['clinic']));
        $mi->attachIterator(new ArrayIterator($input['code']));
        $mi->attachIterator(new ArrayIterator($input['namesNum']));
        $mi->attachIterator(new ArrayIterator($input['total']));
        foreach($mi as $value){
            list($doctor, $clinic, $code, $namesNum, $total) = $value;
            $names = "";
            for($j = 0; $j < $namesNum; $j++){
                $names = $names.''.$input['names'][$n + $j].'; ';
            }
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$i, $nb)
                ->setCellValue('B'.$i, $doctor)
                ->setCellValue('C'.$i, $clinic)
                ->setCellValue('D'.$i, $code)
                ->setCellValue('E'.$i, $names)
                ->setCellValue('F'.$i, $total.' LT');
            $i++;
            $nb++;
            $n += $namesNum;
        }

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);

        $this->downloadExcel($objPHPExcel,"DoctorPurchases");
    }
    private function getSALESpdf(){
        $input = Input::all();
        $i = 1;
        $html = '<html><head><meta charset="utf-8"></head><body><div>
            <div style="text-align: center; font-weight: bold"></div><br>
            <div style="margin: 0 auto; width: 100%">
            <table border="1px solid" style="border-collapse: collapse; width: 650px; text-align: left; font-size: 15px;
                margin-left: 45px;">
            <thead style="font-weight: bold; text-align: center;">
            <tr>
                <td style="text-align: center;">Eil. Nr.</td>
                <td>Prekės pavadinimas</td>
                <td>Kiekis</td>
                <td>Suma $ Ir LT</td>
                <td>Užimama rinkos dalis %</td>
            </tr>
            </thead>
            <tbody>';

        $mi = new MultipleIterator();
        $mi->attachIterator(new ArrayIterator($input['name']));
        $mi->attachIterator(new ArrayIterator($input['amount']));
        $mi->attachIterator(new ArrayIterator($input['dol']));
        $mi->attachIterator(new ArrayIterator($input['ltl']));
        $mi->attachIterator(new ArrayIterator($input['rinkos']));
        foreach($mi as $value){
            list($name, $amount, $dol, $ltl, $rinkos) = $value;
            $html = $html.'<tr>
                <td style="text-align: center;">'.$i.'</td>
                <td>'.$name.'</td>
                <td style="text-align: center;">'.$amount.'</td>
                <td>'.$dol.'$ ir '.$ltl.'LT</td>
                <td style="text-align: center;">'.$rinkos.'</td>
                </tr>';
            $i++;
        }
        $b = $input['bendraSuma'];
        $html = $html.'<tr><td></td><td></td>
            <td style="font-weight: bold; text-align: center;">Bendra suma:</td>
            <td>'.$b.'</td>
            <td></td> </tr>';

        $html = $html.'</tbody></table></div></div></body></html>';

        return PDF::load($html, 'A4', 'portrait')->download("Sales");
    }
    private function getPURCHASESpdf(){
        $input = Input::all();
        $i = 1;
        $n = 0;
        $html = '<html><head><meta charset="utf-8"></head><body><div>
            <div style="text-align: center; font-weight: bold"></div><br>
            <div style="margin: 0 auto; width: 100%">
            <table border="1px solid" style="border-collapse: collapse; width: 950px; text-align: left; font-size: 15px;
                margin-left: 45px;">
            <thead style="font-weight: bold; text-align: center;">
            <tr>
                <td style="text-align: center;">Nb</td>
                <td>Doctor name</td>
                <td>Clinic name</td>
                <td>Clinic address, VAT or clinic code</td>
                <td>What doctors are buying from us</td>
                <td style="text-align: center;">Sales in 2014</td>
            </tr>
            </thead>
            <tbody>';

        $mi = new MultipleIterator();
        $mi->attachIterator(new ArrayIterator($input['doctor']));
        $mi->attachIterator(new ArrayIterator($input['clinic']));
        $mi->attachIterator(new ArrayIterator($input['code']));
        $mi->attachIterator(new ArrayIterator($input['namesNum']));
        $mi->attachIterator(new ArrayIterator($input['total']));
        foreach($mi as $value){
            list($doctor, $clinic, $code, $namesNum, $total) = $value;
            $html = $html.'<tr>
                <td style="text-align: center;">'.$i.'</td>
                <td>'.$doctor.'</td>
                <td>'.$clinic.'</td>
                <td style="text-align: center;">'.$code.'</td>
                <td>';
            for($j = 0; $j < $namesNum; $j++){
                $html = $html.''.$input['names'][$n + $j].'; ';
            }
            $html = $html.'</td>
                <td style="text-align: center;">'.$total.' LT</td>
                </tr>';
            $i++;
            $n += $namesNum;
        }

        $html = $html.'</tbody></table></div></div></body></html>';

        return PDF::load($html, 'A4', 'landscape')->download("DoctorPurchases");
    }
    private function getDOCTORREPORTpdf(){
        $input = Input::all();
        $html = '<html><head><meta charset="utf-8"></head><body><div>
            <div style="text-align: center; font-weight: bold"></div><br>
            <div style="margin: 0 auto; width: 100%">
            <table border="1px solid" style="border-collapse: collapse; width: 950px; text-align: left; font-size: 15px;
                margin-left: 45px;">
                <tbody>
            <tr><td>Doctor name:</td><td>'.$input['doctor'].'</td></tr>
            <tr><td>Clinic name, address </td><td><b>'.$input['clinic'].' </b> <br></td>
            <td>'.$input['clinicAdr'].'<br><b> Company code: '.$input['clinicCode'].'</b> <br>
            <b>'.$input['VAT'].'</b> <br></td><td>AO %
            <br> Fixed discount on pricelist '.$input['disc'].'</td></tr>
            <tr><td></td>';

        foreach($input['year'] as $y){
            $html = $html.'<td>'.$y.'</td>';
        }
        $html = $html.'</tr>';
        $html = $html.'<tr><td>Sales (LTL)</td>';
        foreach($input['total'] as $t){
            $html = $html.'<td>'.$t.'</td>';
        }
        $html = $html.'</tr><tr><td style="line-height:7px; colspan=6">&nbsp;</td></tr>';
        $html = $html.'<tr><th>Details about doctor</th>
            <th>What products buys</th> <th>What products likes</th>
            <th>Frequency (how often ordering)</th> <th>What competitors products use</th>
            <th style="width: 15%">Evaluation of the doctor (1-10 points system)</th></tr>    <tr>
            <td>'.$input['details'].'</td><td>';
        foreach($input['names'] as $pro){
            if($pro == ''){ continue;}
            $html = $html.''.$pro.'; ';
        }
        $html = $html.'</td><td></td><td></td><td>';
        if(isset($input['nnames']) != 0){
            foreach($input['nnames'] as $npro){
                if($npro == ''){ continue;}
                $html = $html.''.$npro.'; ';
            }
        }
        $html = $html.'</td><td>'.$input['score'].'</td>';

        $html = $html.'</tbody></table></div></div></body></html>';

        return PDF::load($html, 'A4', 'landscape')->download("DoctorReport");
    }
    private function getDOCTORREPORTxls(){
        $input = Input::all();
        $objPHPExcel = $this->prepareExcel("DoctorReport");
        $j = 'B';

        $objRichText = $this->getBold("Doctor name:");
        $objPHPExcel->getActiveSheet()->getCell("A1")->setValue($objRichText);

        $objRichText2 = $this->getBold($input['doctor']);
        $objPHPExcel->getActiveSheet()->getCell("B1")->setValue($objRichText2);

        $objRichText3 = $this->getBold("Clinic name, address");
        $objPHPExcel->getActiveSheet()->getCell("A2")->setValue($objRichText3);

        $objRichText4 = $this->getBold($input['clinic']);
        $objPHPExcel->getActiveSheet()->getCell("B2")->setValue($objRichText4);

        $objRichText4 = $this->getBold($input['clinicAdr'].' Company code: '
            .$input['clinicCode'].' '.$input['VAT']);
        $objPHPExcel->getActiveSheet()->getCell("C2")->setValue($objRichText4);

        $objRichText5 = $this->getBold("AO (%) Fixed discount on price list ".$input['disc']);
        $objPHPExcel->getActiveSheet()->getCell("D2")->setValue($objRichText5);

        $objRichText6 = $this->getBold("Sales (LTL)");
        $objPHPExcel->getActiveSheet()->getCell("A4")->setValue($objRichText6);

        $mi = new MultipleIterator();
        $mi->attachIterator(new ArrayIterator($input['year']));
        $mi->attachIterator(new ArrayIterator($input['total']));
        foreach($mi as $value){
            list($year, $total) = $value;
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue($j.'3', $year)
                ->setCellValue($j.'4', $total);
            $j++;
        }
        $objRichText = $this->getBold("Details about doctor");
        $objPHPExcel->getActiveSheet()->getCell("A6")->setValue($objRichText);

        $objRichText = $this->getBold("What products buys");
        $objPHPExcel->getActiveSheet()->getCell("B6")->setValue($objRichText);

        $objRichText = $this->getBold("What products likes");
        $objPHPExcel->getActiveSheet()->getCell("C6")->setValue($objRichText);

        $objRichText = $this->getBold("Frequency (how often ordering)");
        $objPHPExcel->getActiveSheet()->getCell("D6")->setValue($objRichText);

        $objRichText = $this->getBold("What competitors products use");
        $objPHPExcel->getActiveSheet()->getCell("E6")->setValue($objRichText);

        $objRichText = $this->getBold("Evaluation of the doctor (1-10 points system)");
        $objPHPExcel->getActiveSheet()->getCell("F6")->setValue($objRichText);

        $objPHPExcel->getActiveSheet()->getCell('A7')->setValue($input['details']);
        $objPHPExcel->getActiveSheet()->getCell('F7')->setValue($input['score']);

        $names = "";
        if(isset($input['names']) != 0){
            foreach($input['names'] as $pro){
                if($pro == ''){ continue;}
                $names = $names.''.$pro.'; ';
            }
        }
        $objPHPExcel->getActiveSheet()->getCell('B7')->setValue($names);
        $names = "";
        if(isset($input['nnames']) != 0){
            foreach($input['nnames'] as $pro){
                if($pro == ''){ continue;}
                $names = $names.''.$pro.'; ';
            }
        }
        $objPHPExcel->getActiveSheet()->getCell('E7')->setValue($names);

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);

        $this->downloadExcel($objPHPExcel,"DoctorReport");
    }
    private function getVISITxls(){
        $input = Input::all();
        $objPHPExcel = $this->prepareExcel("VisitReport");

        $this->downloadExcel($objPHPExcel,"VisitReport");
    }
    private function getVISITpdf(){
        $input = Input::all();
        $html = '<html><head><meta charset="utf-8"></head><body><div>
            <div style="text-align: center; font-weight: bold"></div><br>
            <div style="margin: 0 auto; width: 100%">
            <table border="1px solid" style="border-collapse: collapse; width: 900px; text-align: left; font-size: 15px;
                margin-left: 45px;">
            <tbody>
            <tr><td colspan="13" style="text-align: center">'.$input['data'].'</td></tr>
            <tr>
                <td style="width: 150px; text-align: center">Aim</td>
                <td style="width: 250px; text-align: center">Conversation</td>
                <td colspan="10" style="text-align: center">Order (psc)</td>
                <td style="width: 150px; text-align: center">Competition</td>
            </tr>
            <tr>
                <td rowspan="5">'.$input['tikslas'].'</td>
                <td rowspan="5">'.$input['pokalbis'].'</td>
                <td class="td2" colspan="8" style="text-align: center; background-color: gray">AO</td>
                <td class="td2" colspan="2" style="background-color: gray"></td>
                <td rowspan="5">'.$input['kompetitoriai'].'</td>
            </tr>
            <tr>
                <td colspan="3" style="background-color: gray">Brackets</td>
                <td style="background-color: gray" rowspan="2">Tubes</td>
                <td style="background-color: gray" rowspan="2">Bands</td>
                <td style="background-color: gray" rowspan="2">Wires</td>
                <td style="background-color: gray" rowspan="2">Plastic</td>
                <td style="background-color: gray" rowspan="2">Instuments</td>
                <td style="background-color: gray" rowspan="2">Aarhus</td>
                <td style="background-color: gray" rowspan="2">Other</td>
            </tr>
            <tr>
                <td style="background-color: gray">Ceramic</td>
                <td style="background-color: gray">Metal</td>
                <td style="background-color: gray">Other</td>
            </tr><tr>';
        foreach($input['item'] as $item){
            $html = $html.'<td>'.$item.'</td>';
        }
        $html = $html.'</tr><tr>';
        foreach($input['kiekis'] as $amount){
            $html = $html.'<td>'.$amount.'</td>';
        }
        $html = $html.'</tr><tr><td></td><td style="text-align: right">Price total:</td>';
        foreach($input['total'] as $total){
            $html = $html.'<td>'.$total.'</td>';
        }
        $html = $html.'<td></td></tr></tbody></table></div></div></body></html>';
        return PDF::load($html, 'A4', 'landscape')->download("VisitReport");
    }
}