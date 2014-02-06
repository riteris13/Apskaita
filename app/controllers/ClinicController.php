<?php
class ClinicController extends BaseController {
    public function getIndex(){
        $items = Clinic::paginate();
        return View::make('clinic.list')->with('items',$items);
    }
    public function getAdd(){
        return View::make('clinic.add');
    }
    public function postAdd(){
        $input = Input::all();
        $validator = Validator::make($input, Clinic::$rules, Clinic::$messages);

        if($validator->fails()){
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
        $clinic = Clinic::create($input);
        $clinic->save();
        $msg = 'Sėkmingai pridėjote kliniką '.$input['pavadinimas'];
        return Redirect::to('clinic')->with('success',$msg);
    }
}