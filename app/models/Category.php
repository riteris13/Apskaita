<?php
class Category extends Eloquent{
    protected $table = 'kategorija';
    protected $fillable = ['pavadinimas'];
    public $timestamps = false;

    public static $rules = [
            'pavadinimas' => 'required|alpha_num|unique:kategorija,pavadinimas|max:45'
    ];
    public static $messages = [
        'required' => 'Neįvesti duomenys',
        'alpha_num' => 'Neteisingai įvesti duomenys! Gali būti naudojamos tik raidės ir skaičiai, be tarpų.',
        'unique' => 'Tokia kategorija jau egzistuoja!',
        'max' => 'Įvestas tekstas per ilgas.'
    ];

    public function products(){
        return $this->hasMany('Item', 'kategorija_id');
    }
    public function fields(){
        return $this->hasMany('Attribute','kategorija_id');
    }
}
