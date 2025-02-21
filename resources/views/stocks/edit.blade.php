<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h2>Edit Stock</h2>
        <form action="{{ route('stocks.update', $stock->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ $stock->name }}" required>
            </div>
            <div class="mb-3">
                <label>Quantity</label>
                <input type="number" name="quantity" class="form-control" value="{{ $stock->quantity }}" required>
            </div>
            <div class="mb-3">
                <label>Price</label>
                <input type="text" name="price" class="form-control" value="{{ $stock->price }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>