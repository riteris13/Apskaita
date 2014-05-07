<?php
class Category extends Eloquent{
    protected $table = 'kategorija';
    protected $fillable = ['pavadinimas'];
    public $timestamps = false;

    public static $rules = [
            'pavadinimas' => 'required|alpha_num_spaces|unique:kategorija,pavadinimas|max:45'
    ];
    public static $messages = [
        'required' => 'Pavadinimas: Neįvesti duomenys.',
        'alpha_num_spaces' => 'Pavadinimas: Neteisingai įvesti duomenys! Gali būti naudojamos tik raidės ir skaičiai, be tarpų.',
        'unique' => 'Tokia kategorija jau egzistuoja!',
        'max' => 'Pavadinimas: Įvestas tekstas negali būti ilgesnis nei 45 simboliai.'
    ];

    public function products(){
        return $this->hasMany('Item', 'kategorija_id');
    }
    public function fields(){
        return $this->hasMany('Attribute','kategorija_id');
    }
}
