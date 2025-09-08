<!DOCTYPE html>
<html>

<head>
    <title>Product List</title>
</head>

<body>
    <h1>All Products</h1>
    <ul>
        @foreach ($products as $product)
            <li>
                {{$product->name}} - {{$product->price}}
                <br>
                {{$product->description}}
                <br>
                <br>
            </li>
        @endforeach
    </ul>
</body>
</html>