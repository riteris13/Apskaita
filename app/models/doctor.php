<?php
class Doctor extends Eloquent {
    protected $table = 'daktaras';
    protected $fillable = ['vardas', 'pavarde', 'klinika_id'];
    public $timestamps = false;

    public function clinic(){
        return $this->belongsTo('Clinic', 'klinika_id');
    }
    public static $rules = [
        'vardas' => 'required|alpha',
        'pavarde' => 'required|alpha',
        'klinika_id' => 'required'
    ];
    public static $messages = [
        'required' => 'Neįvesti duomenys',
        'alpha' => 'Neteisingai įvesti duomenys! Gali būti naudojamos tik raidės be tarpų.'
    ];
}