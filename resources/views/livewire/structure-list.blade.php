<div class="container mx-auto overflow-x-auto shadow-md bg-gray-100 p-6">
    <div class="pb-4">
        <label for="table-search" class="sr-only">Busca</label>
        <div class="flex mt-1 gap-3">
            <input type="text" id="table-search" wire:model="masterCode"
                class="p-2 text-sm rounded-lg w-80 bg-gray-50 border border-gray-600 placeholder-gray-400 text-black"
                placeholder="Buscar por produtos">
            <div class="flex items-center justify-center">
                <p wire:click="search()"
                class="bg-gray-500 text-gray-50 rounded-lg sm:w-auto text-sm px-5 py-2 cursor-pointer">Buscar</p>
            </div>
        </div>
    </div>
    <table class="w-full text-sm text-left text-gray-900 shadow-md sm:rounded-lg table-auto">
        <thead class="text-xs text-gray-100 uppercase bg-gray-600">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Código
                </th>
                <th scope="col" class="px-6 py-3">
                    Descrição
                </th>
                <th scope="col" class="px-6 py-3">
                    Quantidade
                </th>
                <th scope="col" class="px-6 py-3">
                    Total
                </th>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr class="odd:bg-white odd:text-black even:bg-gray-300 even:text-black border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                        {{ $product['code'] }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $product['description'] }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $product['quantity'] }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $product['total'] }}
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr class="font-semibold text-black">
                <th scope="row" class="px-6 py-4 text-base">
                    Total
                </th>
                <td></td>
                <td class="px-6 py-4">{{ $totalItems }}</td>
                <td class="px-6 py-4">{{ $totalPrice }}</td>
            </tr>
        </tfoot>
    </table>
</div>
