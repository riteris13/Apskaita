@foreach($items as $item)
    <p>This is {{ $item->pavadinimas }}</p>
@endforeach

<a href="/category/add" >Pridėti</a>