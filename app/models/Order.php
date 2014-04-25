<?php
class Order extends Eloquent {
    protected $table = 'daktaras_musu_produktas';
    protected $fillable = [
        'data', 'daktaras_id', 'produktas_id', 'pir_kaina', 'kiekis'
    ];
    public $timestamps = false;

    public static $rules = [
        'data' => 'required',
        'kiekis' => 'required|numeric|max:32000|min:1',
        'kaina' => 'required|numeric|max:99999999.99|min:0',
        'nuolaida' => 'required|numeric|max:100|min:0',
        'daktaras_id' => 'required',
        'produktas_id' => 'required'

    ];
    public static $messages = [
        'data.required' => 'Data: Neįvesti duomenys',
        'kiekis.numeric' => 'Kiekis gali būti tik skaičiai.',
        'kiekis.required' => 'Kiekis: Neįvesti duomenys.',
        'kiekis.min' => 'Kiekis negali būti mažiau nei 1.',
        'kiekis.max' => 'Kiekis negali būti daugiau už 32000.',
        'kaina.min' => 'Kaina negali būti mažiau nei 0.',
        'kaina.max' => 'Kaina negali būti daugiau už 99999999.99.',
        'nuolaida.min' => 'Kiekis negali būti mažiau nei 1.',
        'nuolaida.max' => 'Kiekis negali būti daugiau už 100.',
        'daktaras_id.required' => 'Iš sąrašo nepasirinktas klientas',
        'produktas_id.required' => 'Iš sąrašo nepasirinktas produktas'

    ];

    public function doctor(){
        return $this->belongsTo('Doctor', 'daktaras_id');
    }
    public function product(){
        return $this->belongsTo('Item', 'produktas_id');
    }
}