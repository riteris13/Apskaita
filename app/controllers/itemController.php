<?php
class ItemController extends BaseController {
    public function getIndex(){
        $items = Item::paginate();
        return View::make('item.list')->with('items',$items);
    }
}