<?php
class Order extends Eloquent {
    protected $table = 'daktaras_musu_produktas';
    protected $fillable = [
        'data', 'daktaras_id', 'produktas_id', 'kaina', 'kiekis'
    ];
    public $timestamps = false;

    public static $rules = [
        'data' => 'required',
        'kiekis' => 'required|numeric|max:32000|min:1',

    ];
    public static $messages = [
        'data.required' => 'Data: Neįvesti duomenys',
        'kiekis.numeric' => 'Kiekis gali būti tik skaičiai.',
        'kiekis.required' => 'Kiekis: Neįvesti duomenys.',
        'kiekis.min' => 'Kiekiss negali būti mažiau nei 1.',
        'kiekis.max' => 'Kiekis negali būti daugiau už 32000.',

    ];

    public function doctor(){
        return $this->belongsTo('Doctor', 'daktaras_id');
    }
    public function product(){
        return $this->belongsTo('Item', 'produktas_id');
    }
}