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
        if($id == "default"){
            $items = Doctor::where('pavarde', 'LIKE', '%'.e($lname).'%')->orderBy('pavarde')->paginate(15);
            if($items->first() == null){
                return Redirect::to('doctor/')->withErrors('Daktaras, kurio pavardėje būtų <b>'.e($lname).'</b> nerastas.');
            }
            else{
                return View::make('doctor.list')->with('items',$items);
            }
        }
        else{
            $items = Doctor::where('pavarde', 'LIKE', '%'.e($lname).'%')->where('klinika_id', '=', $id)->orderBy('pavarde')->paginate(15);
            if($items->first() == null){
                return Redirect::to('doctor/')->withErrors('Daktaras, kurio pavardėje būtų <b>'.e($lname).'</b> klinikoje <b>'.Clinic::find($id)->pavadinimas.'</b> nerastas.');
            }
            else{
                return View::make('doctor.list')->with('items',$items);
            }
        }
    }
    public function getSearch($id)
    {
        if($id == "default"){
            $items = Doctor::orderBy('pavarde')->paginate(15);
            return View::make('doctor.list')->with('items',$items);
        }
        else{
            $items = Doctor::where('klinika_id', '=', $id)->orderBy('pavarde')->paginate(15);
            if($items->first() == null){
                return Redirect::to('doctor/')->withErrors('Klinikoje <b>'.Clinic::find($id)->pavadinimas.'</b> gydytojų nerasta. Rodomas visas sąrašas.');
            }
            else{
                return View::make('doctor.list')->with('items',$items);
            }
        }
    }
    public function getAdd(){
        return View::make('doctor.add');
    }
    public function getNotourproductlist($id){
        $products = Doctor::find($id)->notourproduct;
        return View::make('doctor.notourproductlist')->with('items',$products);
    }

    public function getRemovenotourproduct($id)
    {
        $model = NotOurProduct::findOrFail($id);
        $msg =  'Sėkmingai pašalinote '.$model->product->pavadinimas;
        $model->delete();
        return Redirect::back()->with('success',$msg);
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