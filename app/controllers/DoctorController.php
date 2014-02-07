<?php
class DoctorController extends BaseController {
    public function getIndex(){
        $items = Doctor::orderBy('pavarde')->paginate(15);
        return View::make('doctor.list')->with('items',$items);
    }
    public function getAdd(){
        return View::make('doctor.add');
    }
    public function postAdd(){
        $input = Input::all();
        $validator = Validator::make($input, Doctor::$rules, Doctor::$messages);

        if($validator->fails()){
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
        $client = Doctor::create($input);
        $client->save();
        $msg = 'Sėkmingai pridėjote daktarą: '.$input['vardas'].' '.$input['pavarde'];
        return Redirect::to('doctor')->with('success',$msg);
    }
    public function getRemove($id){
        $model = Doctor::findOrFail($id);
        $model->delete();
        return Redirect::back()->with('success', 'Sėkmingai pašalinote daktarą!');
    }
}