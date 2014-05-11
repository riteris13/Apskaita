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
    }
    public function getPdf($type)
    {
        if($type == "ao"){
            $this->getAOpdf();
        }
    }


    private  function getAOxls()
    {
        $doctors = Doctor::all();
        $objPHPExcel = $this->prepareExcel("AO");

        $i = 2;

        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Doctor')
            ->setCellValue('B1', 'Discount')
            ->setCellValue('C1', 'Potenciality');

           foreach($doctors as $doctor){
               $objPHPExcel->setActiveSheetIndex(0)
                   ->setCellValue('A'.$i, $doctor->fullname)
                   ->setCellValue('B'.$i, $doctor->nuolaida)
                   ->setCellValue('C'.$i, $doctor->potencialumas);
               $i++;
           }
        $this->downloadExcel($objPHPExcel,"AO");
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

    public function getAOpdf(){
        $doctors = Doctor::all();
        $view = View::make('report.ao')->with('doctors', $doctors);
        $html = $view->render();
        return PDF::load($html, 'A4', 'portrait')->show();

    }

}