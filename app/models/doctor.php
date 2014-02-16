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
        'klinika_id' => 'required',
        'detales' => '|max:1024',
        'ivertinimas' => 'required|numeric|max:10',
        'kodel_neperka' => '|max:1024',
        'kaip_pritraukti' => '|max:1024',
        'nuolaida' => 'required|numeric|max:100',
        'potencialumas' => 'required|numeric|max:100'

    ];
    public static $messages = [
        'required' => 'Neįvesti duomenys',
        'alpha' => 'Neteisingai įvesti duomenys! Gali būti naudojamos tik raidės be tarpų.',
        'max' => 'Įvestas tekstas per ilgas.',
        'numeric' => 'Ivertinimas, nuolaida ir potencialumas gali būti tik skaičiai.'
    ];
    public function getFullNameAttribute(){
        return $this->vardas.' '.$this->pavarde;
    }
}