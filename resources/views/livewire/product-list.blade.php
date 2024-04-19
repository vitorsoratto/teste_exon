<div class="container mx-auto overflow-x-auto shadow-md bg-gray-100 p-6">
    <div class="pb-4">
        <label for="table-search" class="sr-only">Busca</label>
        <div class="relative mt-1">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="text" id="table-search" wire:model.live.debouce.300ms="search"
                class="block p-2 ps-10 text-sm rounded-lg w-80 bg-gray-50 border border-gray-600 placeholder-gray-400 text-black"
                placeholder="Buscar por produtos">
        </div>
    </div>
    <table class="w-full text-sm text-left text-gray-900 shadow-md sm:rounded-lg table-auto">
        <thead class="text-xs text-gray-100 uppercase bg-gray-600">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Código
                </th>
                <th scope="col" class="px-6 py-3">
                    Preço
                </th>
                <th scope="col" class="px-6 py-3">
                    Descrição
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr class="odd:bg-white odd:text-black even:bg-gray-300 even:text-black border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                        {{ $product->code }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $product->price }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $product->description }}
                    </td>
                    <td class="px-6 py-4">
                        <a wire:click="editRegister({{ $product }})" class="font-medium text-blue-600 hover:underline cursor-pointer">Editar</a>
                        <a wire:click="editRegister({{ $product }})" class="font-medium text-red-600 hover:underline cursor-pointer">Remover</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="py-4 px-3">
        <div class="flex">
            <div class="flex space-x-4 items-center mb-3">
                <label>Por página</label>
                <select wire:model.live="perPage" class="bg-gray-300 p-0.5 sm:rounded">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                    <option value="50">50</option>
                </select>
            </div>
        </div>
    </div>
</div>
