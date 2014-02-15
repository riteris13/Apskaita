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
        'kodas' => 'required|alpha_dash',
        'pavadinimas' => 'required|alpha',
		'kaina' => 'required|alpha_num',
        'kategorija_id' => 'required'
    ];
	public static $messages = [
        'required' => 'Neįvesti duomenys',
        'alpha' => 'Neteisingai įvesti duomenys! Gali būti naudojamos tik raidės be tarpų.',
		'alpha_num' => 'Neteisingai įvesti duomenys! Gali būti naudojami tik skaičiai.',
		'alpha_dash' => 'Neteisingai įvesti duomenys! Gali būti naudojamos tik raidės ir skaičiai.'
    ];
}