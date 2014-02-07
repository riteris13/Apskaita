<?php
class Attribute extends Eloquent {
    protected $table = 'kategorijos_atributas';
    public $timestamps = false;

    public function category(){
        return $this->belongsTo('Category','kategorija_id');
    }

}