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
    public function getDoctorpurchases(){
        $doctors = Doctor::all();
        return View::make('report.doctorpurchases')->with('doctors', $doctors);
    }

    public function getClients(){
        $doctors = Doctor::with('clinic')->paginate(15);
        return View::make('report.clients')->with('doctors', $doctors);
    }
    public function getVisitreport(){
        return View::make('report.visitReport');
    }
    public function getDoctorreport(){
        return View::make('report.doctorReport');
    }
    public function getSales(){
        return View::make('report.salesReport');
    }
}