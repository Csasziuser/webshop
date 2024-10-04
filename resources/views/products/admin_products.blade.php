<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    @if (session('success'))
        {{session('success')}}
    @endif


@foreach ($products as $product)
        <li>
            <strong>Termék neve: </strong> {{$product->brand . ' ' . $product->modell}} <br>
            <strong>Ár: </strong> {{$product->price}} Ft <br>
            <strong>Szín: </strong> {{$product->color}} <br>
            <strong>Méret: </strong> {{$product->size}} <br>
            <strong>Készlet: </strong> {{$product->stock}} <br>
            <form action="{{ route('delete_product',$product->id)}}" method="POST" onsubmit="return confirm('Biztosan törölni szeretné ezt a terméket?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Törlés</button>
            </form>
        </li>
    @endforeach
</body>
</html>