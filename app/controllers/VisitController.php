<?php
class VisitController extends BaseController {
    public function getIndex(){
        $items = Visit::orderBy('data', 'Desc')->paginate(15);
        return View::make('visit.list')->with('items',$items);
    }
    public function getAdd(){
        return View::make('visit.add');
    }
	public function getEdit($id){
		$visit = Visit::find($id);
        return View::make('visit.edit')->with('visit', $visit);
    }
    public function postAdd(){
        $input = Input::all();
        $validator = Validator::make($input, Visit::$rules, Visit::$messages);

        if($validator->fails()){
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
        $visit = Visit::create($input);
        $visit->save();
        $msg = 'Sėkmingai pridėjote apsilakymą.';
        return Redirect::to('visit')->with('success',$msg);
    }
	public function postEdit(){
        $input = Input::all();
        $validator = Validator::make($input, Visit::$rules, Visit::$messages);

        if($validator->fails()){
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
        $visit = Visit::find($input['id'])->update($input);
        $msg = 'Sėkmingai atnaujinote apsilakymą.';
        return Redirect::to('visit')->with('success',$msg);
    }
    public function getRemove($id){
        $model = Visit::findOrFail($id);
        $model->delete();
        return Redirect::back()->with('success', 'Sėkmingai pašalinote apsilankymą!');
    }
    public function getApidropdownclient(){
        $input = Input::get('option');
        $doctors = Clinic::find($input)->doctors()->orderBy('pavarde')->get(['id','vardas', 'pavarde']);
        return $doctors;
    }
    public function getDetails(){
        $input = Input::get('option');
        $visit = Visit::where('id', '=', $input)->get(['pokalbis', 'kompetitoriai']);
        return $visit;
    }
}