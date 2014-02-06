<?php
class Visit extends Eloquent {
    protected $table = 'apsilankymas';
    protected $fillable = ['tikslas', 'pokalbis', 'kompetitoriai'];
    public $timestamps = false;


    public static $rules = [
        'tikslas' => 'required|alpha_num',
        'pokalbis' => 'required|alpha_num',
		'kompetitoriai' => 'required|alpha_num'
    ];
    public static $messages = [
        'required' => 'Neįvesti duomenys',
        'alpha_num' => 'Neteisingai įvesti duomenys! Gali būti naudojamos tik raidės ir skaičiai, be tarpų.'
    ];
}