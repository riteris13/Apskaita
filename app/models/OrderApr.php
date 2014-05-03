<?php
class OrderApr extends Eloquent {
    protected $table = 'uzsakymai_aprasymas';
    protected $fillable = ['uzsakymai_id', 'produktas_id', 'pir_kaina', 'kiekis'];
    public $timestamps = false;

    public static $rules = [
        'kiekis' => 'required|numeric|max:32000|min:1',
        'pir_kaina' => 'required|numeric|max:99999999.99|min:0',
        'produktas_id' => 'required'
    ];
    public static $messages = [
        'kiekis.numeric' => 'Kiekis gali būti tik skaičiai.',
        'kiekis.required' => 'Kiekis: Neįvesti duomenys.',
        'kiekis.min' => 'Kiekis negali būti mažiau nei 1.',
        'kiekis.max' => 'Kiekis negali būti daugiau už 32000.',
        'kaina.min' => 'Kaina negali būti mažiau nei 0.',
        'kaina.max' => 'Kaina negali būti daugiau už 99999999.99.',
        'produktas_id.required' => 'Iš sąrašo nepasirinktas produktas'

    ];

    public function order(){
        return $this->belongsTo('Order', 'id');
    }
    public function product(){
        return $this->belongsTo('Item', 'produktas_id');
    }
}