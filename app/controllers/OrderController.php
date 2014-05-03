<?php
class OrderController extends BaseController{
    public function getIndex(){
        $orders = Order::where('arch', '=', 0)->orderBy('data', 'Desc')->orderBy('daktaras_id')->paginate(15);
        return View::make('order.list')->with('items', $orders);
    }
    public function getAdd(){
        return View::make('order.add');
    }
    public function getAdd2($orderID, $nuolD, $nuolOrder){
        return View::make('order.additem')->with('orderID', $orderID)
            ->with('nuolD', $nuolD)->with('nuolOrder', $nuolOrder);
    }
    public function getEdit($id){
        $order = Order::find($id);
        return View::make('order.edit')->with('order', $order);
    }
    public function getEdititem($id){
        $order = OrderApr::find($id);
        return View::make('order.edititem')->with('order', $order);
    }
    public function postAdd(){
        $input = Input::all();
        if(isset($input['Close'])){
            $msg = 'Sėkmingai atšaukėte užsakymo sukūrimą';
            return Redirect::to('order')->with('success',$msg);
        }
        $validator = Validator::make($input, Order::$rules, Order::$messages);
        if($validator->fails()){
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
        $order = Order::create($input);
        $order->save();
        if(isset($input['Submit'])){
            $msg = 'Sėkmingai sukūrėte užsakymą, kurį pateikė: '.$order->doctor->fullName;
            return Redirect::to('order')->with('success',$msg);
        }
        if(isset($input['addMore'])){
            $msg = 'Sėkmingai pridėjote užsakymą, kurį pateikė: '.$order->doctor->fullName;
            return Redirect::to('order/add2/'.$order['id'].'/'.$order->doctor->nuolaida.'/0')
                ->with('success',$msg);
        }
        return Redirect::to('order')->withErrors("Global error");
    }
    public function postAdd2(){
        $input = Input::all();
        if(isset($input['Close'])){
            $msg = 'Sėkmingai uždarėte užsakymo pildymą';
            return Redirect::to('order')->with('success',$msg);
        }
        $input['pir_kaina'] = ($input['kaina'] * (1-$input['nuolaida']*0.01));
        $validator = Validator::make($input, OrderApr::$rulesAdd, Order::$messages);
        if($validator->fails()){
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
        if(isset($input['Submit'])){
            $order = OrderApr::create($input);
            $order->save();
            $msg = 'Sėkmingai pridėjote produktą prie užsakymo';
            return Redirect::to('order')->with('success',$msg);
        }
        if(isset($input['addMore'])){
            $order = OrderApr::create($input);
            $order->save();
            $msg = 'Sėkmingai pridėjote produktą prie užsakymo';
            return Redirect::to('order/add2/'.$input['uzsakymai_id'].'/'.$input['nuolD'].'/'.$input['nuolaida'])
                ->with('success',$msg);
        }
        return Redirect::to('order')->withErrors("Global error");
    }
    public function postEdititem(){
        $input = Input::all();
        if(isset($input['Close'])){
            $msg = 'Sėkmingai uždarėte produkto redagavimą';
            return Redirect::to('order')->with('success',$msg);
        }
        $validator = Validator::make($input, OrderApr::$rulesEdit, OrderApr::$messages);
        if($validator->fails()){
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
        if(isset($input['Submit'])){
            $order = OrderApr::find($input['id']);
            $order->update($input);
            $msg = 'Sėkmingai atnaujinote produktą iš '.$order->order->data
                .'-os užsakymo, kurį pateikė '.$order->order->doctor->fullname;
            return Redirect::to('order')->with('success',$msg);
        }
        return Redirect::to('order')->withErrors("Global error");
    }
    public function postEdit(){
        $input = Input::all();
        if(isset($input['Close'])){
            $msg = 'Sėkmingai uždarėte užsakymo redagavimą';
            return Redirect::to('order')->with('success',$msg);
        }
        $validator = Validator::make($input, Order::$rules, Order::$messages);
        if($validator->fails()){
            return Redirect::back()
                ->withInput()
                ->withErrors($validator);
        }
        if(isset($input['Submit'])){
            $order = Order::find($input['id']);
            $order->update($input);
            $msg = 'Sėkmingai atnaujinote užsakymą, kurį pateikė: '.$order->doctor->fullName;
            return Redirect::to('order')->with('success',$msg);
        }
        return Redirect::to('order')->withErrors("Global error");
    }
    public function getRemove($id){
        $items = OrderApr::where('uzsakymai_id', '=', $id);
        $items->delete();
        $model = Order::findOrFail($id);
        $msg =  'Sėkmingai pašalinote užsakymą, kurį pateikė '.$model->doctor->fullName;
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
        $order = Order::find($input);
        $discount = $order->doctor->nuolaida;
        foreach($order->orders as $pro){
            $pro["produktas"] = Item::find($pro["produktas_id"])->pavadinimas;
            $pro["statusas"] = $order['statusas'];
            $pro["nuolaida"] = $discount;
            array_push($details, $pro->toArray());
        }
        return $details;
    }
    public function getHistory(){
        $orders = Order::where('arch', '=', 1)->orderBy('data', 'Desc')->orderBy('daktaras_id')->paginate(15);
        return View::make('order.history')->with('items', $orders);
    }
    public function getRemoveitem($id){
        $model = OrderApr::findOrFail($id);
        $msg =  'Sėkmingai pašalinote prekę '.$model->product->pavadinimas. ' iš užsakymo';
        $model->delete();
        return Redirect::to('order')->with('success',$msg);
    }
}