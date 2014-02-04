<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ataskaitos apie klientus</title>
	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);

		body {
			margin:0;
			font-family:'Lato', sans-serif;
			text-align:center;
			color: #999;
		}

		h1 {
			font-size: 20px;
			margin: 16px 0 0 0;
		}
	</style>
</head>
<body>
<!--
sql pasibandymui
-->
	<?
	$users = DB::table('daktaras')
					->join('klinika', 'klinika_id', '=', 'id')
					->select('vardas', 'pavarde', 'pavadinimas')
					->get();					
	?>
@foreach($items as $item)
    <p>This is {{ $item->vardas}}</p>
@endforeach

</body>