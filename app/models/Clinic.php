<?php
class Clinic extends Eloquent {
    protected $table = 'klinika';
    protected $fillable = ['pavadinimas', 'adresas', 'vat'];
    public $timestamps = false;

    public function doctors(){
        return $this->hasMany('Doctor','id');
    }
    public static $rules = [
        'pavadinimas' => 'required|alpha_num',
        'adresas' => 'required'
    ];
    public static $messages = [
        'required' => 'Neįvesti duomenys',
        'alpha_num' => 'Neteisingai įvesti duomenys! Gali būti naudojamos tik raidės ir skaičiai, be tarpų.'
    ];
}