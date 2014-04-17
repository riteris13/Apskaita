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
        return View::make('layout.password');
    }

    public function postChange(){
        $validator = Validator::make(Input::all(), User::$change_password_rules, User::$messages);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator);
        }else{
            $user = User::find(Auth::user()->id);

            $old_password = Input::get('OldPassword');
            $password = Input::get('NewPassword');

            if(Hash::check($old_password, $user->getAuthPassword())){
                $user->password = Hash::make($password);

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
}