<?php
class OrderController extends BaseController{
    public function getIndex(){
        $orders = Order::orderBy('data', 'Desc')->paginate(15);
        return View::make('order.list')->with('orders', $orders);
    }
    public function getAdd(){
        return View::make('order.add');
    }
    public function postAdd(){
        $input = Input::all();
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
    public function getRemove($id){
        $model = Order::findOrFail($id);
        $msg =  'Sėkmingai pašalinote užsakymą ID '.$model->id;
        $model->delete();
        return Redirect::to('order')->with('success',$msg);
    }
}