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
        'tikslas.required' => 'Tikslas: Neįvesti duomenys',
        'data.required' => 'Data: Neįvesti duomenys',
        'tikslas.max' => 'Tikslas: Įvestas tekstas negali būti ilgesnis nei 45 simboliai.',
        'pokalbis.max' => 'Pokalbis: Įvestas tekstas negali būti ilgesnis nei 1024 simboliai.',
        'kompetitoriai.max' => 'Kompetitoriai: Įvestas tekstas negali būti ilgesnis nei 128 simboliai.'
    ];
}