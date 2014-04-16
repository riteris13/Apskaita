<?php
class OrderController extends BaseController{
    public function getIndex(){
        $orders = Order::orderBy('data', 'Desc')->orderBy('daktaras_id')->paginate(15);
        return View::make('order.list')->with('orders', $orders);
    }
    public function getAdd(){
        return View::make('order.add');
    }
    public function getEdit($id){
        $order = Order::find($id);
        return View::make('order.edit')->with('order', $order);
    }
    public function postAdd(){
        $input = Input::all();
        $input['pir_kaina'] = $input['kaina'] * (1-$input['nuolaida']*0.01);
        $validator = Validator::make($input, Order::$rules, Order::$messages);

        if($validator->fails()){
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
        $order = Order::create($input);
        $order->save();
        $msg = 'Sėkmingai pridėjote užsakymą, kurį pateikė: '.$order->doctor->fullName;
        return Redirect::to('order')->with('success',$msg);
    }
    public function postEdit(){
        $input = Input::all();
        $validator = Validator::make($input, Order::$rules, Order::$messages);

        if($validator->fails()){
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
        $order = Order::find($input['id']);
        $order->update($input);
        $msg = 'Sėkmingai atnaujinote užsakymą, kurį pateikė: '.$order->doctor->fullName;
        return Redirect::to('order')->with('success',$msg);
    }
    public function getRemove($id){
        $model = Order::findOrFail($id);
        $msg =  'Sėkmingai pašalinote užsakymą ID '.$model->id;
        $model->delete();
        return Redirect::to('order')->with('success',$msg);
    }
    public function getApidropdown(){
        $input = Input::get('option');
        $products = Item::where('kategorija_id', '=' , $input)->orderBy('pavadinimas')->get(['id','pavadinimas']);
        return $products;
    }
    public function getApidropdown2(){
        $input = Input::get('option');
        //$doctors = Doctor::where('klinika_id', '=' , $input)->orderBy('pavarde')->get(['id','vardas', 'pavarde']);
        $doctors = Clinic::find($input)->doctors()->orderBy('pavarde')->get(['id','vardas', 'pavarde']);
        return $doctors;
    }
    public function getPricediscount(){
        $input = Input::get('option');
        $price = Item::where('id', '=', $input)->get(['kaina', 'nuolaida']);
    return $price;
    }
    public function getDiscount(){
        $input = Input::get('option');
        $discount = Doctor::where('id', '=', $input)->get(['nuolaida']);
        return $discount;
    }
}