<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Structure;
use App\Utils\MoneyFormat;
use Livewire\Component;

class StructureList extends Component
{
    public $masterCode = '';
    public $products = [];
    public $totalPrice = 0;
    public $totalItems = 0;

    public function render()
    {
        return view('livewire.structure-list');
    }

    public function search() {
        $masterProduct = Product::where('code', $this->masterCode)->first();
        $children = $masterProduct->children()->get();
        $this->products = [];
        foreach ($children as $child) {
            $childOfProduct = $child->child()->first();
            $childHasChild = $childOfProduct->children()->get()->count();
            if (!$childHasChild) {
                $this->products[] = [
                    'code' => $childOfProduct->code,
                    'description' => $childOfProduct->description,
                    'price' => $childOfProduct->price,
                    'quantity' => $child->quantity,
                    'total' =>  MoneyFormat::formatBRL($child->quantity * $childOfProduct->price),
                ];
            }
        };
        $totalPrice = collect($this->products)->sum(function ($product) {
            return $product['quantity'] * $product['price'];
        });
        $this->totalPrice = MoneyFormat::formatBRL($totalPrice);
        $this->totalItems = collect($this->products)->sum('quantity');
    }
}
