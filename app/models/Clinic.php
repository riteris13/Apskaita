<?php
class Clinic extends Eloquent {
    protected $table = 'klinika';
    protected $fillable = ['pavadinimas', 'adresas', 'kodas', 'vat'];
    public $timestamps = false;

    public function doctors(){
        return $this->hasMany('Doctor','klinika_id');
    }
    public static $rules = [
        'pavadinimas' => 'required|alpha_num|max:45',
        'adresas' => 'required|max:128',
        'kodas' => 'required|numeric|max:9'
    ];
    public static $messages = [
        'required' => 'Neįvesti duomenys.',
        'alpha_num' => 'Neteisingai įvesti duomenys! Gali būti naudojamos tik raidės ir skaičiai, be tarpų.',
        'max' => 'Įvestas tekstas per ilgas.',
        'numeric' => 'Įmonės kodas gali būti tik skaičiai.'
    ];
    public function getVatPayerAttribute(){
        return $this->vat?'Taip':'Ne';
    }
}