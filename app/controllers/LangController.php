<?php
class LangController extends BaseController {

    public function getIndex(){
        return Redirect::back()->withInput();
    }
    public function getSet($id){
        Session::put('lang', $id);
        return Redirect::back()->withInput();
    }
}