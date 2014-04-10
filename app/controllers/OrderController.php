<?php
class OrderController extends BaseController{
    public function getIndex(){
        $orders = Order::all();
        return View::make('order.list')->with('orders', $orders);
    }
}