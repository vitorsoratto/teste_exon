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
            'products' => Product::search($this->search)->paginate($this->perPage),
        ]);
    }
}
