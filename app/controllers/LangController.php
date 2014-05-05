<?php
class LangController extends BaseController {

    public function getIndex(){
        return Redirect::back()->withInput();
    }
    public function getSet($lng){
        Session::put('lang', $lng);

        return Redirect::to(URL::previous());
    }
}