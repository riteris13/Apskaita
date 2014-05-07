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
        Session::forget('lang');
        return Redirect::to('/auth');
    }

    public function getChange(){
        return View::make('user.password');
    }

    public function postChange(){
        $validator = Validator::make(Input::all(), User::$password_change_rules, User::$messages);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }else{
            $user = User::find(Auth::user()->id);

            $old_password = Input::get('OldPassword');
            $password = Input::get('NewPassword');

            if(Hash::check($old_password, $user->getAuthPassword())){
                $user->password = Hash::make($password);
                $user->first_login = '0';

                if($user->save()){
                    return Redirect::to('/')->with('success', 'Password changed');
                }else{
                    return Redirect::back()->withErrors("Database error");
                }
            }else{
                return Redirect::back()->withErrors("Blogai įvestas esamas slaptažodis");
            }

        }
        return Redirect::back()->withErrors("Global error");
    }

    public function getAdd(){
        return View::make('user.add');
    }
    public function postAdd(){
        $input['email'] = Input::get('email');
        $input['role'] = Input::get('role');

        $validator = Validator::make($input, User::$add_user_rules, User::$messages);
        if($validator->fails()){
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
        $pass = str_random(6);
        $password = Hash::make($pass);
        $user = User::create(['email'=>$input['email'], 'password'=>$password, 'role'=>$input['role'], 'first_login'=>'1']);
        $user->save();
        $msg = 'Sėkmingai pridėjote vartotoją '. $input['email'].' jo slaptažodis '.$pass;
        return Redirect::to('auth/add')->with('success',$msg);
    }
}