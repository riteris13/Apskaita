<?php
class ItemController extends BaseController {
    public function getIndex(){
        $items = Item::orderBy('pavadinimas')->paginate(15);
        return View::make('item.list')->with('items',$items);
    }
	public function getAdd(){
        return View::make('item.add');
    }
	public function postAdd(){
        $input = Input::all();
        $validator = Validator::make($input, Item::$rules, Item::$messages);

        if($validator->fails()){
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
        $stuff = Item::create($input);
        $stuff->save();
        $msg = 'Sėkmingai pridėjote produktą: '.$stuff->pavadinimas;
        return Redirect::to('item')->with('success',$msg);
    }
}