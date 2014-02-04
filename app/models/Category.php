<?php
class Category extends Eloquent{
    protected $table = 'kategorija';
    protected $fillable = ['pavadinimas'];
    public $timestamps = false;

    public static $rules = [

       // [
            'pavadinimas' => 'required|alpha_num'
      //  ]
    ];
}
