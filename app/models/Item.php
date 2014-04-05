<?php
class Item extends Eloquent {
    protected $table = 'produktas';
	protected $fillable =
        [
            'pavadinimas', 'kodas', 'kaina', 'nuolaida', 'kategorija_id', 'sistema','slotas',
            'kabliukai','puse','zandikaulis','sukimas','rotacija','dydis','zverelis','spalva'
        ];
    public $timestamps = false;

    public function category(){
        return $this->belongsTo('Category', 'kategorija_id');
    }
	public static $rules = [
        'kodas' => 'required|alpha_dash|unique:produktas,kodas|max:45',
        'pavadinimas' => 'required|alpha|max:45',
		'kaina' => 'required|numeric|max:1000000000|min:0',
        'nuolaida' => 'required|numeric|max:100|min:0',
    ];
	public static $messages = [
        'pavadinimas.required' => 'Pavadinimas: Neįvesti duomenys.',
        'kodas.required' => 'Kodas: Neįvesti duomenys.',
        'kaina.required' => 'Kaina: Neįvesti duomenys.',
        'nuolaida.required' => 'Taikoma nuolaida: Neįvesti duomenys.',
        'pavadinimas.alpha' => 'Pavadinimas: Neteisingai įvesti duomenys! Gali būti naudojamos tik raidės be tarpų.',
		'kodas.alpha_dash' => 'Kodas: Neteisingai įvesti duomenys! Gali būti naudojamos tik raidės, brūkšnys ir skaičiai.',
        'pavadinimas.max' => 'Pavadinimas: Įvestas tekstas negali būti ilgesnis nei 45 simboliai.',
        'kodas.max' => 'Kodas: Įvestas tekstas negali būti ilgesnis nei 45 simboliai.',
        'nuolaida.max' => 'Nuolaida negali būti daugiau nei 100%.',
        'kaina.max' => 'Kaina negali būti didesnė nei 1000000000.',
        'kaina.min' => 'Kaina negali būti mažesnė nei 0.',
        'nuolaida.min' => 'Nuolaida negali būti mažiau nei 0.',
        'kodas.unique' => 'Produktas su tokiu kodu jau egzistuoja!',
        'nuolaida.numeric' => 'Nuolaida gali būti tik skaičiai.',
        'kaina.numeric' => 'Kaina gali būti tik skaičiai.'
    ];
}