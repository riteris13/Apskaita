<?php
class Visit extends Eloquent {
    protected $table = 'apsilankymas';
    protected $fillable = ['tikslas', 'pokalbis', 'kompetitoriai', 'data'];
    public $timestamps = false;


    public static $rules = [
        'tikslas' => 'required|max:128',
        'pokalbis' => 'max:1024',
        'kompetitoriai' => 'max:128',
        'data' => 'required'
    ];
    public static $messages = [
        'required' => 'Neįvesti duomenys',
        'max' => 'Įvestas tekstas per ilgas.'
    ];
}