<?php
class NotOurProduct extends Eloquent {
    protected $table = 'daktaras_nemusu_produktas';
    protected $fillable = ['daktaras_id', 'produktas_id'];
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo('Item', 'produktas_id');
    }
}
