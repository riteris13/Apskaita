<?php
class CategoryController extends BaseController {
    public function getIndex(){
        $items = Category::paginate(15);
        return View::make('category.list')->with('items',$items);
    }
    public function getAdd(){
        return View::make('category.add');
    }

    public function postAdd(){
        $input = Input::get('pavadinimas');
        $atrr = Input::only('sistema','slotas','kabliukai','puse','zandikaulis','sukimas','rotacija','dydis','zverelis','spalva');
        $validator = Validator::make(['pavadinimas'=>$input], Category::$rules, Category::$messages);
        if($validator->fails()){
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
        list($keys, $values) = array_divide($atrr);
        $category = Category::create(['pavadinimas'=>$input]);
        $category->save();

        for($i = 0; $i < 10; $i++){
            if($values[$i] > 0){
                Attribute::create(['kategorija_id'=>$category->id, 'atributas'=>$keys[$i]]);
            }
        }
        $msg = 'Sėkmingai pridėjote kategoriją '.$input;
        return Redirect::to('category')->with('success',$msg);
    }
    public function getRemove($id){
        $model = Category::findOrFail($id);
        $atrr = Attribute::where('kategorija_id', '=', $id);
        $atrr->delete();
        $model->delete();
        return Redirect::back()->with('success', 'Sėkmingai pašalinote kategoriją!');
    }
}