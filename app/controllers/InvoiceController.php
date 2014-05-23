<?php
class InvoiceController extends BaseController {
    public function getIndex(){
        return View::make('invoice.invoice');
    }

    public function getWithid($id)
    {
        try{
            $model = Order::findOrFail($id);
        }catch (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            $message = 'Užsakymas tokiu ID nerastas';
            return Redirect::to('order')->withErrors($message);
        }
        $details = array();
        foreach($model->orders as $pro){
            $pro["produktas"] = Item::find($pro["produktas_id"])->pavadinimas;
            array_push($details, $pro->toArray());
        }
        //dd($details);
        return View::make('invoice.invoice')->with('products', $details)->with('orderid', $id);
    }
}