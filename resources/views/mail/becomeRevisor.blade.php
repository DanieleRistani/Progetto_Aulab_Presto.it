<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it</title>
</head>
<body>

    <div>
        <h1>Un utente ha chiesto di lavorare per voi</h1>
        <h2>Dati dell'utente:</h2>
        <p>Nome: {{ $user->name }}</p>
        <p>Email: {{ $user->email }}</p>
        <p>Se desideri che l'utente lavori con voi clicca il link qui sotto:</p>
        <a href="{{ route('rendi.revisore', compact('user')) }}">Rendi Revisore</a>
    </div>
    
</body>
</html>