<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Dashboard</title>
</head>
@include('layouts.navbar')

<body>
    <h1 style="color: red; text-align: center;">Panel Admin</h1>
    @php
        $user = Auth::user();
    @endphp
    <h2>Bonjour {{ $user->name ?? 'Pas de nom' }}</h2>

    <h2 class="mt-5 mb-5">Liste des clients</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Role</th>
                <th>Supprimer un utilisateur</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="p-5">{{ $user->id }}</td>
                    <td class="p-5">{{ $user->name }}</td>
                    <td class="p-5">{{ $user->email }}</td>
                    <td class="p-5">{{ $user->role }}</td>
                    <td class="p-5">
                        <form action="{{ route('delete-user', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button style="color: red" type="submit"
                                onclick="return confirm('Supprimer cette utilisateur ?')">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h2 class="mb-5 mt-5">Liste des produits</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td class="p-5">{{ $product->id }}</td>
                    <td class="p-5">{{ $product->name }}</td>
                    <td class="p-5">{{ $product->description }}</td>
                    <td class="p-5">{{ $product->price }}</td>
                    <td class="p-5">{{ $product->stock }}</td>
                    <td class="p-5">
                        <a style="color: green" href="{{ route('edit-product', $product->id) }}">Modifier</a>
                    </td>
                    <td class="p-5">
                        <form action="{{ route('delete-product', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button style="color: red" type="submit" onclick="return confirm('Supprimer ce produit ?')">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
    <div class="m-5">
        <a href="{{ route('create-product') }}">
            Crée un produit
        </a>
    </div>
</body>

</html>