<!DOCTYPE html>

<h1>Crée produit</h1>

<form action="{{ route('store-product') }}" method="post">
    @csrf
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="description" placeholder="Description">
    <input type="text" name="price" placeholder="Price">
    <input type="number" name="stock" placeholder="Stock">
    <button type="submit">Créer</button>
</form>