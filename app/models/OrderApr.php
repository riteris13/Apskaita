<?php
class OrderApr extends Eloquent {
    protected $table = 'uzsakymai_aprasymas';
    protected $fillable = ['uzsakymai_id', 'produktas_id', 'pir_kaina', 'kiekis'];
    public $timestamps = false;

    public function order(){
        return $this->belongsTo('Order', 'id');
    }
    public function product(){
        return $this->belongsTo('Item', 'produktas_id');
    }
}