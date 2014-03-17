<?php
class Attribute extends Eloquent {
    protected $table = 'kategorijos_atributas';
    protected $fillable = ['kategorija_id','atributas'];
    public $timestamps = false;

    public function category(){
        return $this->belongsTo('Category','id');
    }

}