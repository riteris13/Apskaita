<?php
class Clinic extends Eloquent {
    protected $table = 'klinika';
    protected $fillable = ['pavadinimas', 'adresas', 'kodas', 'vat'];
    public $timestamps = false;

    public function doctors(){
        return $this->hasMany('Doctor','klinika_id');
    }
    public static $rules = [
        'pavadinimas' => 'required|alpha_num_spaces|max:45',
        'adresas' => 'required|alpha_num_spaces|max:128',
        'kodas' => 'required|numeric|regex:/^[0-9]{9}$/'
    ];
    public static $messages = [
        'pavadinimas.required' => 'Pavadinimas: Neįvesti duomenys.',
        'adresas.required' => 'Adresas: Neįvesti duomenys.',
        'kodas.required' => 'Įmonės kodas: Neįvesti duomenys.',
        'pavadinimas.alpha_num_spaces' => 'Pavadinimas: Gali būti naudojamos tik raidės ir skaičiai su tarpais.',
        'adresas.alpha_num_spaces' => 'Adresas: Gali būti naudojamos tik raidės ir skaičiai su tarpais.',
        'pavadinimas.max' => 'Pavadinimas: Įvestas tekstas negali būti ilgesnis nei 45 simboliai.',
        'adresas.max' => 'Adresas: Įvestas tekstas negali būti ilgesnis nei 128 simboliai.',
        'kodas.regex' => 'Kodas: Įvestas tekstas negali būti trumpesnis arba ilgesnis nei 9 simboliai.',
        'kodas.numeric' => 'Įmonės kodas gali būti tik skaičiai.'
    ];
    public function getVatPayerAttribute(){
        return $this->vat?'Taip':'Ne';
    }
}