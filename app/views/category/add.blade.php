{{ Form::open(array('url' => 'category/add')) }}

{{Form::text('pavadinimas'); }}
{{Form::submit('Pridėti'); }}

{{ Form::close() }}
