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
        $id = Input::get('id');
        $validator = Validator::make($input, array_merge(Item::$rules, array('kodas' => 'alpha_dash|max:45|unique:produktas,kodas,'.$id)), Item::$messages);
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
        $input = Input::all();
        if($input['kodas'] == null){
            return Redirect::to('item/search/'.$input['id']);
        }
        return Redirect::to('item/searchwithcode/'.$input['id'].'/'.$input['kodas']);
    }
    public function getSearch($id){
        if($id == "default"){
            $items = Item::orderBy('pavadinimas')->paginate(15);
            return View::make('item.list')->with('items',$items)->with('fail', 'first');
        }
        else{
            $items = Item::where('kategorija_id', '=', $id)->orderBy('pavadinimas')->paginate(15);
            if($items->first() == null){
                return Redirect::to('/item')
                    ->withErrors('Kategorijoje <b>'
                        .Category::find($id)->pavadinimas.
                        '</b> produktų nerasta. Rodomas visas sąrašas.')
                    ->with('fail', 'true');
            }
            else{
                return View::make('item.list')->with('items',$items)->with('fail', 'false');
            }
        }
    }
    public function getSearchwithcode($id, $code){
        if($id == "default"){
            $items = Item::where('kodas', 'LIKE', '%'.e($code).'%')->orderBy('pavadinimas')->paginate(15);
            if($items->first() == null){
                return Redirect::to('/item')->withErrors('Produktas, kurio kode būtų <b>'.e($code).'</b> nerastas.')
                                            ->with('fail', 'true');
            }
            else{
                return View::make('item.list')->with('items',$items)->with('fail', 'false');
            }
        }
        else{
            $items = Item::where('kodas', 'LIKE', '%'.e($code).'%')->where('kategorija_id', '=', $id)->orderBy('pavadinimas')->paginate(15);
            if($items->first() == null){
                return Redirect::to('/item')
                    ->withErrors('Produktas, kurio kode būtų <b>'
                        .e($code).'</b> kategorijoje <b>'
                        .Category::find($id)->pavadinimas.'</b> nerastas.')
                    ->with('fail', 'true');
            }
            else{
                return View::make('item.list')->with('items',$items)->with('fail', 'false');
            }
        }
    }
    public function getRemove($id){
        $model = Item::findOrFail($id);
        $msg =  'Sėkmingai pašalinote produktą '.$model->pavadinimas;
        $model->delete();
        return Redirect::to('item')->with('success',$msg);
    }
}