<?php
class AuthController extends BaseController{
    public function getIndex(){
        return View::make('layout.guest');
    }
    public function postIndex(){
        if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))){
            return Redirect::to('/');
        }
        return Redirect::to('/')->withInput();

    }
    public function getLogout(){
        Auth::logout();
        return Redirect::to('/auth');
    }
}