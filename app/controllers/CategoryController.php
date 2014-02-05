<?php
class CategoryController extends BaseController {
    public function getIndex(){
        $items = Category::all();
        return View::make('category.list')->with('items',$items);
    }
    public function getAdd(){
        return View::make('category.add');
    }

    public function postAdd(){
        $input = Input::all();
        $validator = Validator::make($input, Category::$rules, Category::$messages);

        if($validator->fails()){
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
        $category = Category::create($input);
        $category->save();
        $msg = 'Sėkmingai pridėjote kategoriją '.$input['pavadinimas'];
        return Redirect::to('category')->with('success',$msg);
    }
    public function getRemove($id){
        $model = Category::findOrFail($id);
        $model->delete();
        return Redirect::back()->with('success','Sėkmingai pašalinote kategoriją!');
    }
}