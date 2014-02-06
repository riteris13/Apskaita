<?php
class VisitController extends BaseController {
    public function getIndex(){
        $items = Visit::paginate();
        return View::make('visit.list')->with('items',$items);
    }
    public function getAdd(){
        return View::make('visit.add');
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
        $msg = 'Sėkmingai pridėjote apsilakymą';
        return Redirect::to('visit')->with('success',$msg);
    }
}