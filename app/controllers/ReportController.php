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
    public function getDoctorreport($id, $laik){
        $doctor = Doctor::find($id);
        return View::make('report.doctorReport')->with('doctor', $doctor)->with('laikas', $laik);
    }
    public function getSales(){
        $items = Item::all();
        return View::make('report.salesReport')->with('items', $items);
    }
    public function getSelectdoctor(){
        return View::make('report.selectDoctor');
    }
    public function getApidropdownclient(){
        $input = Input::get('option');
        $doctors = Clinic::find($input)->doctors()->orderBy('pavarde')->get(['id','vardas', 'pavarde']);
        return $doctors;
    }
    public function postSelectdoctor(){
        $id = Input::get('daktaras_id');
        $laik = Input::get('laikotarpis');
        if(!isset($id)){
            return Redirect::back()
                ->withInput()
                ->withErrors("Nepasirinktas gydytojas");
        }
        return Redirect::to('report/doctorreport/'.$id.'/'.$laik);
    }
}