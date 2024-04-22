<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Structure;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class StructureRegister extends Component
{
    public $code = '';
    public $childCode = '';
    public $quantity = 0;
    public $product = null;
    public $report = [];
    public $message = '';

    public function render()
    {
        return view('livewire.structure-register');
    }

    public function searchItem()
    {
        $code = $this->code;

        $masterProduct = Product::where('code', $code)->first();
        $this->product = $masterProduct;

        $this->message = '';
        if (!$masterProduct) {
            $this->message = 'Produto não encontrado';
            return;
        }

        $structures = Structure::where('master_product', $code)->get()->all();

        $report[] = [
            "master" => $code,
            "open" => false,
            "structure" => $structures,
        ];
        while (count($structures) > 0) {
            $newStructures = [];
            foreach ($structures as $structure) {
                $childCode = $structure->child_product;
                $child = Product::where('code', $childCode)->first();
                if ($child) {
                    $childStructure = Structure::where('master_product', $child->code)->get()->all();
                    if (count($childStructure) > 0) {
                        $newStructures = $childStructure;
                        $report[] = [
                            "master" => $child->code,
                            "open" => false,
                            "structure" => $childStructure,
                        ];
                    }
                }
                $structures = $newStructures;
            }
        }

        if (!empty($report)) {
            $this->report = $report;
        }
    }

    public function toggle($index)
    {
        $this->report[$index]['open'] = !$this->report[$index]['open'];
    }

    public function store()
    {
        $newChildExists = Product::where('code', $this->childCode)->first();

        $this->message = '';
        if (!$newChildExists) {
            $this->message = 'Produto filho não cadastrado';
            return;
        }

        $childStructure = Structure::where('master_product', $this->code)
            ->where('child_product', $this->childCode)
            ->first();

        if ($childStructure) {
            $childStructure->quantity = $this->quantity;
            $childStructure->update();

            $this->reset(['childCode', 'quantity']);

            return;
        }
        Structure::create([
            'master_product' => $this->code,
            'child_product' => $this->childCode,
            'quantity' => $this->quantity,
        ]);

        $this->reset(['childCode', 'quantity']);
    }

    public function edit($structure)
    {
        $this->code = $structure['code'];
        $this->searchItem();
    }
}
