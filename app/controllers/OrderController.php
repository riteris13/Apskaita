<?php
class OrderController extends BaseController{
    public function getIndex(){
        $orders = Order::all();
        return View::make('order.list')->with('orders', $orders);
    }
    public function getRemove($id){
        $model = Order::findOrFail($id);
        $msg =  'Sėkmingai pašalinote užsakymą ID '.$model->id;
        $model->delete();
        return Redirect::to('order')->with('success',$msg);
    }
}