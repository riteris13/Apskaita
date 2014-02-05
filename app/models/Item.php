<?php
class Item extends Eloquent {
    protected $table = 'produktas';

    public function category(){
        return $this->belongsTo('Category', 'kategorija_id');
    }
}