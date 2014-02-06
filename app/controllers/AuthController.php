<?php
class AuthController extends BaseController{
    public function getIndex(){
        return View::make('layout.guest');
    }
    public function postIndex(){
        if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))){
            return Redirect::to('/');
        }
        return Redirect::to('/auth')
                     ->withInput()
                     ->with('wrong', 'Įvesti neteisingi duomenys!');

    }
    public function getLogout(){
        Auth::logout();
        return Redirect::to('/auth');
    }
}