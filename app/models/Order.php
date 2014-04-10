<?php
class Order extends Eloquent {
    protected $table = 'daktaras_musu_produktas';
    protected $fillable = [
        'data', 'daktaras_id', 'produktas_id', 'kaina', 'kiekis'
    ];
    public $timestamps = false;

    public function doctor(){
        return $this->belongsTo('Doctor', 'daktaras_id');
    }
    public function product(){
        return $this->belongsTo('Item', 'produktas_id');
    }
}