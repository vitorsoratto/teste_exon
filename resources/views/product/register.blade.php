<x-product>
    <form class="container mx-auto bg-gray-100 p-6" action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="flex gap-6">
            <div class="flex-initial mb-5 w-36">
                <label for="code" class="block mb-2 text-sm font-medium">Código</label>
                <input type="number" id="code" name="code"
                    class="border border-gray-300 text-sm rounded-lg block w-full p-2.5" placeholder="000000000000"
                    maxlength="12" required />
            </div>
            <div class="flex-initial mb-5 w-60">
                <label for="price" class="block mb-2 text-sm font-medium">Preço</label>
                <input type="number" id="price" name="price"
                    class="border border-gray-300 text-sm rounded-lg block w-full p-2.5" placeholder="0.00"
                    step="0.01" min="0.01" required />
            </div>
        </div>
        <div class="mb-5">
            <label for="description" class="block mb-2 text-sm font-medium">Descrição do produto</label>
            <textarea id="description" rows="4" name="description"
                class="block p-2.5 w-full text-sm bg-gray-30 rounded-lg border border-gray-300" placeholder="Digite aqui..."
                required></textarea>
        </div>

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>


        @if (session()->has('success'))
            <p class="mt-2 text-sm text-green-600 font-medium">{{ session()->get('success') }}</p>
        @else
            <p class="mt-2 text-sm text-red-600 font-medium">{{ session()->get('error') }}</p>
        @endif
    </form>
</x-product>
