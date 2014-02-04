<?php
class Clinic extends Eloquent {
    protected $table = 'klinika';

    public function doctors(){
        return $this->hasMany('Doctor','id');
    }
}