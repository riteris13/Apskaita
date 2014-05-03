<?php
class Order extends Eloquent {
    protected $table = 'uzsakymai';
    protected $fillable = [
        'data', 'daktaras_id', 'statusas', 'arch'
    ];
    public $timestamps = false;

    public static $rules = [
        'data' => 'required',
        'daktaras_id' => 'required'
    ];

    public static $messages = [
        'data.required' => 'Data: Neįvesti duomenys',
        'daktaras_id.required' => 'Iš sąrašo nepasirinktas klientas',
    ];

    public function doctor(){
        return $this->belongsTo('Doctor', 'daktaras_id');
    }

    public function orders(){
        return $this->hasMany('OrderApr', 'uzsakymai_id');
    }
}