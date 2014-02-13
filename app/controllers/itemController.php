<?php
class ItemController extends BaseController {
    public function getIndex(){
        $items = Item::orderBy('pavadinimas')->paginate(15);
        return View::make('item.list')->with('items',$items)->with('fail', 'true');
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
    public function postIndex(){
        $id = Input::get('id');
        return Redirect::to('item/sorted/'.$id);
    }
    public function getSorted($id){
        $items = Item::where('kategorija_id', '=', $id)->orderBy('pavadinimas')->paginate(15);
        if($items->count() == 0 ){
            $items = Item::orderBy('pavadinimas')->paginate(15);
            return View::make('item.list')->with('items',$items)->with('fail', 'true');
        }
        return View::make('item.list')->with('items',$items)->with('fail', 'false');
    }
}