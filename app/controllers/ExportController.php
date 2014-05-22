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

    public function getXls($type)
    {
        if($type == "ao"){
            $this->getAOxls();
        }
        elseif($type == "iatc"){
            $this->getIATCxls();
        }
    }
    public function getPdf($type)
    {
        if($type == "ao"){
            $this->getAOpdf();
        }
        elseif($type == "iatc"){
            $this->getIATCpdf();
        }
    }
    public function postExpenses(){
        if(Input::get('PDF') == "Export PDF"){
            $this->getEXPENSESpdf();
        }elseif(Input::get('XLS') == "Export XLS"){
            $this->getEXPENSESxls();
        }
        else{
            return Redirect::to('report/expenses')->withErrors('Global error');
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

    private  function getAOxls()
    {
        $doctors = Doctor::all();
        $objPHPExcel = $this->prepareExcel("AO");

        $i = 2;

        $objRichText = $this->getBold("Doctor");
        $objPHPExcel->getActiveSheet()->getCell("A1")->setValue($objRichText);

        $objRichText2 = $this->getBold("Discount");
        $objPHPExcel->getActiveSheet()->getCell("B1")->setValue($objRichText2);

        $objRichText3 = $this->getBold("Potenciality");
        $objPHPExcel->getActiveSheet()->getCell("C1")->setValue($objRichText3);

           foreach($doctors as $doctor){
               $objPHPExcel->setActiveSheetIndex(0)
                   ->setCellValue('A'.$i, $doctor->fullname)
                   ->setCellValue('B'.$i, $doctor->nuolaida)
                   ->setCellValue('C'.$i, $doctor->potencialumas);
               $i++;
           }
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);

        $this->downloadExcel($objPHPExcel,"AO");
    }

    private function getIATCxls()
    {
        $doctors = Doctor::all();

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

        $i = 2;

        foreach($doctors as $doctor)
        {
            $objPHPExcel->getActiveSheet()->getCell('A'.$i)->setValue($doctor->fullname);

            $visipavadinimai = array();
            foreach($doctor->orders as $items){
                foreach($items->orders as $item){
                    array_push($visipavadinimai, $item->product->pavadinimas);
                }
            }
            $pavadinimai = array_unique($visipavadinimai);

            $objPHPExcel->getActiveSheet()->getCell('B'.$i)->setValue(implode(", ", $pavadinimai));

            $visipavadinimai = array();
            foreach( $doctor->notourproduct as $item){
                    array_push($visipavadinimai, $item->product->pavadinimas);
            }
            $objPHPExcel->getActiveSheet()->getCell('C'.$i)->setValue(implode(", ", $visipavadinimai));


            $objPHPExcel->getActiveSheet()->getCell('D'.$i)->setValue($doctor->kodel_neperka);

            $objPHPExcel->getActiveSheet()->getCell('E'.$i)->setValue($doctor->kaip_pritraukti);

            $i++;
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
        $doctors = Doctor::all();
        $i = 0;
             foreach($doctors as $item)
             {
            $html = $html.'<tr>
                <td style="text-align : left">'.$item->fullname.'</td>
                <td style="text-align : center">'.$item->nuolaida.'</td>
                <td style="text-align : center">'.$item->potencialumas.'</td>
            </tr>';
            };
        $html = $html.'</tbody>
        </table></div></div></body></html>';
        // dd($html);
        return PDF::load($html, 'A4', 'portrait')->show();
    }

    private function getIATCpdf()
    {
        $doctors = Doctor::all();

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
        foreach($doctors as $doctor)
        {
            $html = $html.'<tr>
                <td>'.$doctor->fullname.'</td>';

            $visipavadinimai = array();
            foreach($doctor->orders as $items){
                foreach($items->orders as $item){
                    array_push($visipavadinimai, $item->product->pavadinimas);
                }
            }
            $pavadinimai = array_unique($visipavadinimai);

            $html= $html.'<td>';
            foreach($pavadinimai as $pavadinimas){
                $html= $html.$pavadinimas."\n";
            }
            $html= $html.'</td>';

            $visipavadinimai = array();
            foreach( $doctor->notourproduct as $item){
                array_push($visipavadinimai, $item->product->pavadinimas);
            }
            $html= $html.'<td>';
            foreach($visipavadinimai as $pavadinimas){
                $html= $html.$pavadinimas."\n";
            }
            $html= $html.'</td>

            <td>'.$doctor->kodel_neperka.'</td>
            <td>'.$doctor->kaip_pritraukti.'</td>
            </tr>';
        }
        $html = $html.'</tbody>
            </table></div></div></body></html>';
        // dd($html);
        return PDF::load($html, 'A4', 'landscape')->show();
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
        //return print_r($input['names'][0]);
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
                $html = $html.''.$input['names'][$n + $j].' ';
            }
            $html = $html.'</td>
                <td style="text-align: center;">'.$total.'LT</td>
                </tr>';
            $i++;
            $n += $namesNum;
        }

        $html = $html.'</tbody></table></div></div></body></html>';

        return PDF::load($html, 'A4', 'landscape')->download("DoctorPurchases");
    }
    private function getPURCHASESxls(){
        echo "nebaigtas eksportas";
    }
}