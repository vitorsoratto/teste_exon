<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('product');
    }

    public function register()
    {
        return view('product.register');
    }

    public function list()
    {
        return view('product.list');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'code' => 'required',
                'description' => 'required',
                'price' => 'required',
            ]);

            $product = Product::find($request->input('code'));

            if ($product)
                return redirect()->back()->with('error', 'Produto já cadastrado!');

            $product = new Product();
            $product->code = $request->input('code');
            $product->description = $request->input('description');
            $product->price = $request->input('price');
            $product->save();
        }
        catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Erro ao cadastrar produto!');
        }

        return redirect()->back()->with('success', 'Produto cadastrado com sucesso!');
    }
}
