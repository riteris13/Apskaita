<?php
class ReportController extends BaseController {

    public function getIndex(){
        return View::make('report.list');
    }
    public function getAO(){
        $doctors = Doctor::all();
        return View::make('report.ao')->with('doctors', $doctors);
    }
    public function getClients(){
        $doctors = Doctor::with('clinic')->paginate(15);
        return View::make('report.clients')->with('doctors', $doctors);
    }
}