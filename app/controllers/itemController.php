<?php
class ItemController extends BaseController {
    public function getIndex(){
        $items = Item::orderBy('pavadinimas')->paginate(15);
        return View::make('item.list')->with('items',$items)->with('fail', 'first');
    }

	public function getSelect(){
        return View::make('item.select');
    }
    public function postSelect(){
        $id = Input::get('kategorija_id');
        return Redirect::to('item/add/'.$id);
    }
    public function getAdd($id){
        return View::make('item.add')->with('id', $id);
    }
	public function postAdd(){
        $id = Input::get('kategorija_id');
        $input = Input::all();
        $validator = Validator::make($input, Item::$rules, Item::$messages);

        if($validator->fails()){
            return Redirect::to('item/add/'.$id)
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