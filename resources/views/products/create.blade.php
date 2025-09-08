<!DOCTYPE Html>
<html>

<head>
    <h1>Create Product</h1>
</head>

<body>
    <title>Add Product</title>
    {{-- Success Message --}}
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    {{-- Validation Form --}}
    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/products-store" , method="POST">
        @csrf {{-- Security Token Required --}}
        <label for="name">Product Name:</label><br>
        <input type="text" name="name" value="{{ old('name') }}"><br><br>

        <label for="price">Price:</label><br>
        <input type="text" name="price" value="{{ old('price') }}"><br><br>

        <label for="description">Description:</label><br>
        <textarea name="description">{{ old('description') }}</textarea><br><br>

        <button type="submit">Add Product</button>
    </form>
</body>

</html>