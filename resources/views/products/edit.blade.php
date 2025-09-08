<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>

    {{-- Success message --}}
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Edit Form --}}
    <form action="/product-data/{{$products->id}}" method="POST">
        @csrf
        <label for="name">Product Name:</label><br>
        <input type="text" name="name" value="{{ old('name', $products->name) }}"><br><br>

        <label for="price">Price:</label><br>
        <input type="text" name="price" value="{{ old('price', $products->price) }}"><br><br>

        <label for="description">Description:</label><br>
        <textarea name="description">{{ old('description', $products->description) }}</textarea><br><br>

        <button type="submit">Update Product</button>
    </form>
</body>
</html>
