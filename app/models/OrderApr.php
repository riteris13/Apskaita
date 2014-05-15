<?php
class OrderApr extends Eloquent {
    protected $table = 'uzsakymai_aprasymas';
    protected $fillable = ['uzsakymai_id', 'produktas_id', 'pir_kaina', 'kiekis'];
    public $timestamps = false;

    public static $rulesAdd = [
        'kaina' => 'required|numeric|max:99999999.99|min:0.01',
        'nuolaida' => 'required|numeric|max:100|min:0',
        'kiekis' => 'required|numeric|max:32000|min:1',
        'pir_kaina' => 'required|numeric|max:99999999.99|min:0.01',
        'produktas_id' => 'required'
    ];
    public static $rulesEdit = [
        'kiekis' => 'required|numeric|max:32000|min:1',
        'pir_kaina' => 'required|numeric|max:99999999.99|min:0',
        'produktas_id' => 'required'
    ];
    public static $messages = [
        'kaina.required' => 'Kaina: Neįvesti duomenys.',
        'kiekis.numeric' => 'Kiekis gali būti tik skaičiai.',
        'kiekis.required' => 'Kiekis: Neįvesti duomenys.',
        'nuolaida.required' => 'Nuolaida: Neįvesti duomenys.',
        'kiekis.min' => 'Kiekis negali būti mažiau nei 1.',
        'kiekis.max' => 'Kiekis negali būti daugiau už 32000.',
        'kaina.numeric' => 'Kaina gali būti tik skaičiai',
        'pir_kaina.numeric' => 'Kaina gali būti tik skaičiai',
        'kaina.max' => 'Kaina negali būti daugiau už 99999999.99.',
        'pir_kaina.min' => 'Bendra pardavimo kaina negali būti mažiau nei 0.01',
        'pir_kaina.max' => 'Bendra pardavimo kaina negali būti daugiau už 99999999.99.',
        'nuolaida.min' => 'Nuolaida negali būti mažiau nei 1.',
        'nuolaida.max' => 'Nuolaida negali būti daugiau už 100.',
        'kaina.min' => 'Kaina negali būti mažiau nei 0.01',
        'produktas_id.required' => 'Iš sąrašo nepasirinktas produktas'
    ];

    public function order(){
        return $this->belongsTo('Order', 'uzsakymai_id');
    }
    public function product(){
        return $this->belongsTo('Item', 'produktas_id');
    }
}