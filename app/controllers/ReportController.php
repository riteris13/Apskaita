<?php
class ReportController extends BaseController {

    public function getIndex(){
        return View::make('report.list');
    }

    public function getAO(){
        $doctors = Doctor::all();
        return View::make('report.ao')->with('doctors', $doctors);
    }

    public function getExpenses(){
        return View::make('report.expenses');
    }

    public function getCustinfo(){
        $doctors = Doctor::all();
        return View::make('report.custinfo')->with('doctors', $doctors);
    }

    public function getExport(){
        $doctors = Doctor::all();
        $content = View::make('report.ao')->with('doctors', $doctors)->render();
        return PDF::loadHTML($content)->setPaper('a4')->save('myfile.pdf');
    }

    public function getClients(){
        $doctors = Doctor::with('clinic')->paginate(15);
        return View::make('report.clients')->with('doctors', $doctors);
    }
}