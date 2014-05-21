<?php
class DoctorController extends BaseController {
    public function getIndex(){
        $items = Doctor::orderBy('pavarde')->paginate(15);
        return View::make('doctor.list')->with('items',$items);
    }
    public function postIndex(){
        $input = Input::all();
        if($input['pavarde'] == null){
            return Redirect::to('doctor/search/'.$input['id']);
        }
        return Redirect::to('doctor/searchwithlname/'.$input['id'].'/'.$input['pavarde']);
    }
    public function getSearchwithlname($id, $lname)
    {
        $doctors = Doctor::where('pavarde', 'LIKE', '%'.e($lname).'%')->get();
        if($doctors->first() == null){echo "tuscia";}
        foreach($doctors as $doctor){
            echo $doctor->fullname."<br>";
        }
    }
    public function getSearch($id)
    {
        if($id == "default"){
            dd($id);
        }
        else{
            dd(Clinic::find($id)->pavadinimas);
        }
    }
    public function getAdd(){
        return View::make('doctor.add');
    }
	public function getEdit($id){
		$doctor = Doctor::find($id);
        return View::make('doctor.edit')->with('doctor', $doctor);
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
        $msg = 'Sėkmingai pridėjote daktarą: '.$client->fullName;
        return Redirect::to('doctor')->with('success',$msg);
    }
	public function postEdit(){
        $input = Input::all();
        $validator = Validator::make($input, Doctor::$rules, Doctor::$messages);

        if($validator->fails()){
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
        $doctor = Doctor::find($input['id'])->update($input);
        $msg = 'Sėkmingai atnaujinote daktarą: '.$input['vardas'].' '.$input['pavarde'];
        return Redirect::to('doctor')->with('success',$msg);
    }
    public function getRemove($id){
        $model = Doctor::findOrFail($id);
        $msg =  'Sėkmingai pašalinote daktarą '.$model->fullName;
        $model->delete();
        return Redirect::to('doctor')->with('success',$msg);
    }
    public function getDetails(){
        $input = Input::get('option');
        $doctor = Doctor::where('id', '=', $input)->get(['detales', 'kodel_neperka', 'kaip_pritraukti']);
        return $doctor;
    }
}