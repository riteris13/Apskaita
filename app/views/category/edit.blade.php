@extends('layout.core')
@section('content')
<?
$wordlist = array("sistema", "slotas", "kabliukai", "puse", "zandikaulis", "sukimas",
    "rotacija", "dydis", "zverelis", "spalva");
foreach($wordlist as $word){
    if(strpos($category, $word)){
        $category[$word] = 1;
    }
    else {
        $category[$word] = 0;
    }
}
preg_match('/\d+/', $category, $match);
$category['ID'] = $match[0];
?>
{{ Form::model($category, array('url' => 'category/edit', 'class'=>'form-default')) }}

<h4>Kategorijos pavadinimas</h4>
{{Form::text('pavadinimas', $category['pavadinimas'], array('class'=>'form-control', 'type'=>'text')); }}

<h4>Pažymėkite reikalingus atributus:</h4>
Sistema
{{Form::checkbox('sistema') }}
<br>
Slotas
{{Form::checkbox('slotas'); }}
<br>
Kabliukai
{{Form::checkbox('kabliukai'); }}
<br>
Pusė
{{Form::checkbox('puse'); }}
<br>
Žandikaulis
{{Form::checkbox('zandikaulis'); }}
<br>
Sukimas
{{Form::checkbox('sukimas'); }}
<br>
Rotacija
{{Form::checkbox('rotacija'); }}
<br>
Dydis
{{Form::checkbox('dydis'); }}
<br>
Žvėrelis
{{Form::checkbox('zverelis'); }}
<br>
Spalva
{{Form::checkbox('spalva'); }}

<br>
<br>
{{ Form::hidden('ID', $category['ID']) }}
{{Form::submit('Atnaujinti', array('class'=>'btn btn-primary')); }}
{{ Form::close() }}

@stop