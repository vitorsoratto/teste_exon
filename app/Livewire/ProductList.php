<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductList extends Component
{
    public $perPage = 10;
    public $search = '';

    public function render()
    {
        return view('livewire.product-list', [
            'products' => Product::search($this->search)->orderBy('updated_at', 'desc')->paginate($this->perPage),
        ]);
    }

    public function editRegister($product) {
        return redirect()->route('products.register')->with('product', $product);
    }

    public function deleteRegister($product) {
        $dbProduct = Product::where('code', $product['code'])->first();
        $hasStructure = $dbProduct->children()->count() || $dbProduct->masters()->count();

        if ($hasStructure) {
            return redirect()->route('products.list')->with('error', 'Produto não pode ser excluído, pois possui estruturas associadas!');
        }

        $dbProduct->delete();
        return redirect()->route('products.list')->with('success', 'Produto excluído com sucesso!');
    }
}
