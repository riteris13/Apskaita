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
        'pavadinimas.required' => 'Pavadinimas: Neįvesti duomenys.',
        'adresas.required' => 'Adresas: Neįvesti duomenys.',
        'kodas.required' => 'Įmonės kodas: Neįvesti duomenys.',
        'alpha_num' => 'Įmonės kodas: Neteisingai įvesti duomenys! Gali būti naudojamos tik raidės ir skaičiai, be tarpų.',
        'pavadinimas.max' => 'Pavadinimas: Įvestas tekstas negali būti ilgesnis nei 45 simboliai.',
        'adresas.max' => 'Adresas: Įvestas tekstas negali būti ilgesnis nei 128 simboliai.',
        'kodas.max' => 'Kodas: Įvestas tekstas negali būti ilgesnis nei 9 simboliai.',
        'kodas.numeric' => 'Įmonės kodas gali būti tik skaičiai.'
    ];
    public function getVatPayerAttribute(){
        return $this->vat?'Taip':'Ne';
    }
}