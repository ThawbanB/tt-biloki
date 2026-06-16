<!DOCTYPE html>

<h1>Modifier Produit</h1>

<form action="{{ route('update-product', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $product->name }}">
    <input type="text" name="description" value="{{ $product->description }}">
    <input type="text" name="price" value="{{ $product->price }}">
    <input type="number" name="stock" value="{{ $product->stock }}">
    <button type="submit">Modifier</button>
</form>

</html>