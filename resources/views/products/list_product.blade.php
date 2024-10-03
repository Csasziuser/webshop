<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach ($products as $product)
        <li>
            <strong>Termék neve: </strong> {{$product->brand . ' ' . $product->modell}} <br>
            <strong>Ár: </strong> {{$product->price}} Ft <br>
            <strong>Szín: </strong> {{$product->color}} <br>
            <strong>Méret: </strong> {{$product->size}} <br>
            <strong>Készlet: </strong> {{$product->stock}} <br>
            <form action="{{ route('update_stock',$product->id)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="quantity">Mennyiség: </label>
                    <input type="number" name="quantity" class="form-control" min="1" placeholder="Mennyiség" required>
                </div>
                <button class="btn btn-primary">Vásárlás</button>
            </form>
        </li>
    @endforeach
</body>
</html>