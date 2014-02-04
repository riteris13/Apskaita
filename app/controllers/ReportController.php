<?php
class ReportController extends BaseController {

    public function getClients(){
        $doctors = Doctor::with('clinic')->get();
        return View::make('report.clients')->with('doctors', $doctors);
    }
}