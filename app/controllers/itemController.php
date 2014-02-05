<?php
class ItemController extends BaseController {
    public function getIndex(){
        $items = Item::all();
        return View::make('item.list')->with('items',$items);
    }
}