@foreach($items as $item)
    <p>{{{ $item->pavadinimas}}} <a href="/category/remove/{{$item->id}}">X</a></p>
@endforeach

<a href="/category/add" >Pridėti</a>