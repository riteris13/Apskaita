<?php
class Item extends Eloquent {
    protected $table = 'produktas';
	protected $fillable =
        [
            'pavadinimas', 'kodas', 'kaina', 'kategorija_id', 'sistema','slotas',
            'kabliukai','puse','zandikaulis','sukimas','rotacija','dydis','zverelis','spalva'
        ];
    public $timestamps = false;

    public function category(){
        return $this->belongsTo('Category', 'kategorija_id');
    }
	public static $rules = [
        'kodas' => 'required|alpha_dash|unique:produktas,kodas|max:45',
        'pavadinimas' => 'required|alpha|max:45',
		'kaina' => 'required|numeric|max:1000000000',
        'kategorija_id' => 'required'
    ];
	public static $messages = [
        'required' => 'Neįvesti duomenys',
        'alpha' => 'Neteisingai įvesti duomenys! Gali būti naudojamos tik raidės be tarpų.',
		'alpha_num' => 'Neteisingai įvesti duomenys! Gali būti naudojami tik skaičiai.',
		'alpha_dash' => 'Neteisingai įvesti duomenys! Gali būti naudojamos tik raidės, brūkšnys ir skaičiai.',
        'max' => 'Įvestas tekstas per ilgas.',
        'unique' => 'Produktas su tokiu kodu jau egzistuoja!',
        'numeric' => 'Kaina gali būti tik skaičiai.'
    ];
}