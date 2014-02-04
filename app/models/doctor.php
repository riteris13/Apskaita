<?php
class Doctor extends Eloquent {
    protected $table = 'daktaras';

    public function clinic(){
        return $this->belongsTo('Clinic', 'klinika_id');
    }
}