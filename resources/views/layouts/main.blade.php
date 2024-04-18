<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teste Exon | Vitor Soratto</title>

    @livewireStyles

    <link rel="stylesheet" href="/css/app.css">
</head>

<body>
    <nav class=" bg-gray-800 text-white p-4">
        <div class="container mx-auto">
            <ul class="flex items-center justify-center">
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li class="pl-4"><a href="{{ url('/produtos') }}">Cadastro de Produtos</a></li>
            </ul>
        </div>
    </nav>

    @yield('content')

    @livewireScripts
</body>

</html>
