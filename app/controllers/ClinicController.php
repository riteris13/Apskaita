<?php
class ClinicController extends BaseController {
    public function getIndex(){
        $items = Clinic::orderBy('pavadinimas')->paginate(15);
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
    public function getRemove($id){
        $model = Clinic::findOrFail($id);
        $msg =  'Sėkmingai pašalinote kliniką '.$model->pavadinimas;
        $model->delete();
        return Redirect::back()->with('success', $msg);
    }
}