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
        $validator = Validator::make($input, Category::$rules);

        if($validator->fails()){
            return Redirect::back()->withInput();
        }
        $category = Category::create($input);
        $category->save();
        return Redirect::to('category');
    }
    public function getRemove($id){
        $model = Category::findOrFail($id);
        $model->delete();
        return Redirect::back();
    }
}