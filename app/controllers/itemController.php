<?php
class ItemController extends BaseController {
    public function getIndex(){
        $items = Item::orderBy('pavadinimas')->paginate(15);
        return View::make('item.list')->with('items',$items)->with('fail', 'first');
    }

    public function getEdit($id){
        $item = Item::find($id);
        $atrributes = Attribute::where('kategorija_id', '=', $item->kategorija_id)->get();
        return View::make('item.edit')->with('item', $item)->with('attributes', $atrributes);
    }

	public function getSelect(){
        return View::make('item.select');
    }
    public function postSelect(){
        $id = Input::get('kategorija_id');
        return Redirect::to('item/add/'.$id);
    }
    public function getAdd($id){
        $atrributes = Attribute::where('kategorija_id', '=', $id)->get();
        return View::make('item.add')->with('id', $id)->with('attributes', $atrributes);
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
    public function postEdit(){
        $input = Input::all();
        //$old = Input::get('oldKodas');
        $id = Input::get('id');
        $validator = Validator::make($input, array_merge(Item::$rules, array('kodas' => 'alpha_dash|max:45|unique:produktas,kodas')), Item::$messages);
        if($validator->fails()){
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
        Item::find($id)->update($input);
        $msg = 'Sėkmingai atnaujinote produktą: '.$input['pavadinimas'];
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