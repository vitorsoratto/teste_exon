<form class="container mx-auto bg-gray-100 p-6" wire:submit="store">
    @csrf
    <div class="flex gap-3">
        <div class="flex-initial mb-5 w-36">
            <label for="code" class="block mb-2 text-sm font-medium">Código</label>
            <input type="text" id="code" name="code"
                class="border border-gray-300 text-sm rounded-lg block w-full p-2.5" placeholder="000000000000"
                maxlength="12" wire:model="code" required />
        </div>
        <div class="flex items-center justify-center mt-2">
            <p wire:click="searchItem()"
                class="bg-gray-500 text-gray-50 rounded-lg sm:w-auto text-sm px-5 py-1.5 cursor-pointer">Buscar</p>
        </div>
    </div>
    <div class="flex gap-6">
        <div class="flex-initial mb-5 w-36">
            <label for="child-code" class="block mb-2 text-sm font-medium">Produto filho</label>
            <input type="text" id="child-code" name="child-code"
                class="border border-gray-300 text-sm rounded-lg block w-full p-2.5" placeholder="000000000000"
                maxlength="12" wire:model="childCode" required />
        </div>
        <div class="flex-initial mb-5 w-36">
            <label for="quantity" class="block mb-2 text-sm font-medium">Quantidade</label>
            <input type="number" id="quantity" name="quantity"
                class="border border-gray-300 text-sm rounded-lg block w-full p-2.5" placeholder="0"
                wire:model="quantity" required />
        </div>
    </div>

    <button type="submit"
        class="text-white bg-blue-700 mb-6 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Cadastrar</button>

    @unless (empty($message))
        <p class="mt-2 text-sm text-red-600 font-medium">{{ $message }}</p>
    @endunless

    <div class="text-black">
        <ul>
            @foreach ($report as $item)
                <li class="px-x mb-5 hover:bg-gray-200">
                    <a wire:click="toggle({{ $loop->index }})" class="flex items-center px-2 hover:bg-gray-200">
                        {{ $item['master'] }} - Produto(s) filho(s)
                        @if ($item['open'])
                            <x-heroicon-o-chevron-down class="w-3.5 h-3.5" />
                        @else
                            <x-heroicon-o-chevron-right class="w-3.5 h-3.5" />
                        @endif
                    </a>
                    @if (count($item['structure']) > 0 && $item['open'])
                        <ul>
                            @foreach ($item['structure'] as $itemChild)
                                <li class="ml-4 py-2 px-4 hover:bg-gray-200 border border-gray-300">

                                    <table
                                        class="w-full text-sm text-left text-gray-900 shadow-md sm:rounded-lg table-auto">
                                        <thead class="text-xs text-gray-100 uppercase bg-gray-600">
                                            <tr>
                                                <th scope="col" class="px-3 py-1">
                                                    Código
                                                </th>
                                                <th scope="col" class="px-3 py-1">
                                                    Preço
                                                </th>
                                                <th scope="col" class="px-3 py-1">
                                                    Quantidade
                                                </th>
                                                <th scope="col" class="px-3 py-1">
                                                    Ação
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="px-3 py-1">
                                                    {{ $itemChild['child']->code }}
                                                </td>
                                                <td class="px-3 py-1">
                                                    {{ $itemChild['child']->price }}
                                                </td>
                                                <td class="px-3 py-1">
                                                    {{ $itemChild['quantity'] }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    <a wire:click="edit({{ $itemChild->child }})"
                                                        class="font-medium text-blue-600 hover:underline cursor-pointer">Editar</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>

    @if (session()->has('success'))
        <p class="mt-2 text-sm text-green-600 font-medium">{{ session()->get('success') }}</p>
    @else
        <p class="mt-2 text-sm text-red-600 font-medium">{{ session()->get('error') }}</p>
    @endif
</form>
