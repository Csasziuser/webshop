<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        @csrf
        <label for="brand">Márka: </label>
        <input type="text" name="brand" id="brand" required><br><br>

        <label for="model">Modell: </label>
        <input type="text" name="modell" id="model" required><br><br>

        <label for="color">Szín: </label>
        <select name="color" id="color">
            <option value="black">Fekete</option> 'black','white', 'yellow', 'red'
            <option value="white">Fehér</option>
            <option value="yellow">Sárga</option>
            <option value="red">Piros</option>
        </select><br><br>

        <label for="size">Méret</label>
        <input type="number" name="size" id="size" required min="27" max="52"><br><br>

        <label for="stock">Készlet</label>
        <input type="number" name="stock" id="stock" required><br><br>

        <label for="price">Érték</label>
        <input type="number" name="price" id="price" required><br><br>

        <label for="type">Típus</label>
        <select name="product_type_id" id="product_type_id">
            @foreach ($types as $type)
                <option value="{{$type->id}}">{{$type->type}}</option>
            @endforeach
        </select>

        <button type="submit">Mentés</button>
    </form>
</body>
</html>