<?php
class Visit extends Eloquent {
    protected $table = 'apsilankymas';
    protected $fillable = ['tikslas', 'pokalbis', 'kompetitoriai', 'data', 'daktaras_id'];
    public $timestamps = false;


    public static $rules = [
        'tikslas' => 'required|alpha_num_spaces|max:128',
        'pokalbis' => 'alpha_num_spaces|max:1024',
        'kompetitoriai' => 'max:128',
        'data' => 'required',
        'daktaras_id' => 'required'
    ];
    public static $messages = [
        'tikslas.required' => 'Tikslas: Neįvesti duomenys',
        'data.required' => 'Data: Neįvesti duomenys',
        'daktaras_id.required' => 'Nepasirinktas daktaras',
        'tikslas.max' => 'Tikslas: Įvestas tekstas negali būti ilgesnis nei 128 simboliai.',
        'pokalbis.max' => 'Pokalbis: Įvestas tekstas negali būti ilgesnis nei 1024 simboliai.',
        'tikslas.alpha_num_spaces' => 'Tikslas: Gali būti naudojamos tik raidės ir skaičiai su tarpais.',
        'pokalbis.alpha_num_spaces' => 'Pokalbis: Gali būti naudojamos tik raidės ir skaičiai su tarpais.',
        'kompetitoriai.max' => 'Kompetitoriai: Įvestas tekstas negali būti ilgesnis nei 128 simboliai.'
    ];
    public function doctor(){
        return $this->belongsTo('Doctor', 'daktaras_id');
    }
}