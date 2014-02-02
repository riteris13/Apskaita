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
        $category = Category::create($input);
        $category->save();
        return Redirect::to('category');
    }
}