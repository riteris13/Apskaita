<?php
class OrderController extends BaseController{
    public function getIndex(){
        $orders = Order::where('arch', '=', 0)->orderBy('data', 'Desc')->orderBy('daktaras_id')->paginate(15);
        return View::make('order.list')->with('items', $orders);
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
        $input['uzsakymai_id'] = $order->id;
        $items = OrderApr::create($input);
        $items->save();
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
    public function getApidropdownclient(){
        $input = Input::get('option');
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

    public function postIndex(){
        $id = Input::get('status');
        return Redirect::to('order/sorted/'.$id);
    }
    public function getSorted($id){
        if($id != 2){
            $orders = Order::where('statusas', '=', $id)->where('arch', '=', 0)->orderBy('data', 'Desc')
                ->orderBy('daktaras_id')->paginate(15);
            if($orders->count() != 0 ){
                return View::make('order.list')->with('items',$orders);
            }
        }
        $orders = Order::where('arch', '=', 0)->orderBy('data', 'Desc')->orderBy('daktaras_id')->paginate(15);
        return View::make('order.list')->with('items', $orders);
    }
    public function getStatus($id){
        try{
            $model = Order::findOrFail($id);
        }catch (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            $message = 'Užsakymas tokiu ID nerastas';
            return Redirect::to('order')->withErrors($message);
        }
            if($model->statusas == 0){
                $model->statusas = 1;
            }else{
                $model->statusas = 0;
            }
            $model->save();
            return Redirect::to('order')->with('success', "Statusas pakeistas");

    }
    public function getArchive($id){
        try{
            $model = Order::findOrFail($id);
        }catch (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            $message = 'Užsakymas tokiu ID nerastas';
            return Redirect::to('order')->withErrors($message);
        }
            $model->arch = 1;
            $model->save();
        return Redirect::to('order')->with('success', "Užsakymas perkeltas į archyvą");

    }
    public function getDetails(){
        $input = Input::get('option');
        $details = array();
        foreach(Order::find($input)->orders as $pro){
            $i = $pro["produktas_id"];
            $pro["produktas"] = Item::find($i)->pavadinimas;
            array_push($details, $pro->toArray());
        }
        return $details;
    }
    public function getHistory(){
        $orders = Order::where('arch', '=', 1)->orderBy('data', 'Desc')->orderBy('daktaras_id')->paginate(15);
        return View::make('order.history')->with('items', $orders);
    }
}