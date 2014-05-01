<?php
class Doctor extends Eloquent {
    protected $table = 'daktaras';
    protected $fillable = [
        'vardas', 'pavarde', 'klinika_id', 'detales', 'ivertinimas', 'kodel_neperka', 'kaip_pritraukti',
        'nuolaida', 'potencialumas'
    ];
    public $timestamps = false;

    public function clinic(){
        return $this->belongsTo('Clinic', 'klinika_id');
    }
    public static $rules = [
        'vardas' => 'required|alpha|max:45',
        'pavarde' => 'required|alpha|max:45',
        'detales' => 'max:1024',
        'ivertinimas' => 'required|numeric|max:10|min:0',
        'kodel_neperka' => 'max:1024',
        'kaip_pritraukti' => 'max:1024',
        'nuolaida' => 'required|numeric|max:100|min:0',
        'potencialumas' => 'required|numeric|max:100|min:0'

    ];
    public static $messages = [
        'vardas.required' => 'Vardas: Neįvesti duomenys.',
        'pavarde.required' => 'Pavardė: Neįvesti duomenys.',
        'ivertinimas.required' => 'Įvertinimas: Neįvesti duomenys.',
        'nuolaida.required' => 'Taikoma nuolaida: Neįvesti duomenys.',
        'potencialumas.required' => 'Potencialumas: Neįvesti duomenys.',
        'vardas.alpha' => 'Vardas: Neteisingai įvesti duomenys! Gali būti naudojamos tik raidės be tarpų.',
        'pavarde.alpha' => 'Pavardė: Neteisingai įvesti duomenys! Gali būti naudojamos tik raidės be tarpų.',
        'vardas.max' => 'Vardas: Įvestas tekstas negali būti ilgesnis nei 45 simboliai.',
        'pavarde.max' => 'Pavardė: Įvestas tekstas negali būti ilgesnis nei 45 simboliai.',
        'detales.max' => 'Detalės: Įvestas tekstas negali būti ilgesnis nei 1024 simboliai.',
        'ivertinimas.max' => 'Įvertinimas negali būti daugiau nei 10.',
        'kodel_neperka.max' => 'Kodėl neperka: Įvestas tekstas negali būti ilgesnis nei 1024 simboliai.',
        'kaip_pritraukti.max' => 'Kaip pritraukti: Įvestas tekstas negali būti ilgesnis nei 1024 simboliai.',
        'nuolaida.max' => 'Nuolaida negali būti daugiau nei 100%.',
        'potencialumas.max' => 'Potencialumas negali būti daugiau nei 100%.',
        'ivertinimas.numeric' => 'Ivertinimas gali būti tik skaičiai.',
        'nuolaida.numeric' => 'Nuolaida gali būti tik skaičiai.',
        'potencialunmas.numeric' => 'Potencialumas gali būti tik skaičiai.',
        'ivertinimas.min' => 'Ivertinimas negali būti mažiau nei 0.',
        'nuolaida.min' => 'Nuolaida negali būti mažiau nei 0.',
        'potencialumas.min' => 'Potencialumas negali būti mažiau nei 0.'
    ];
    public function getFullNameAttribute(){
        return $this->vardas.' '.$this->pavarde;
    }
    public function notOurProduct(){
        return $this->hasMany('NotOurProduct','daktaras_id')->groupby('produktas_id');
    }
    public function order(){
        return $this->hasMany('Order', 'daktaras_id');
    }
}