<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Page de connexion</title>
</head>

<body>
    <h1 style="color: red;">Page de connexion</h1>
    <h2 class="mt-5 mb-3">Connexion</h2>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <br>
        <button type="submit">Login</button>
    </form>

    <br>
    <br>


    <h2 class="mt-5 mb-3">Inscription</h2>
    <form action="{{ route('register') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Name">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <br>
        <button type="submit">Register</button>
    </form>
</body>
@if ($errors->any())
    <ul style="color:red">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

</html>