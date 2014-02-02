<?php
class ItemController extends BaseController {
    public function getIndex(){
        return Item::all();
    }
}