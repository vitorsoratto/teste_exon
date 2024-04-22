<x-main>
 <div class="container text-center p-4 mt-2 mx-auto text-white bg-gray-600">
        <p class="mb-6">Página de Estruturas</p>
        <ul class="flex items-center justify-center text-gray-800 font-medium">
            <li class="rounded-md bg-gray-100 px-2 py-1"><a href="{{ route('structures.register') }}">Cadastro</a></li>
            <li class="rounded-md bg-gray-100 px-2 py-1 ml-4"><a href="{{ route('structures.list') }}">Listagem</a></li>
        </ul>
    </div>
    {{ $slot }}
</x-main>
