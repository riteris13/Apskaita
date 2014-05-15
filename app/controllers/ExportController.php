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

}