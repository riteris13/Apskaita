<?php
class Category extends Eloquent{
    protected $table = 'kategorija';
    protected $fillable = ['pavadinimas'];
    public $timestamps = false;

    public static $rules = [
            'pavadinimas' => 'required|alpha_num|unique:kategorija,pavadinimas'
    ];
    public static $messages = [
        'required' => 'Neįvesti duomenys',
        'alpha_num' => 'Neteisingai įvesti duomenys! Gali būti naudojamos tik raidės ir skaičiai, be tarpų.',
        'unique' => 'Tokia kategorija jau egzistuoja!'
    ];

    public function products(){
        return $this->hasMany('Item', 'kategorija_id');
    }
}
