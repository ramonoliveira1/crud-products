<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    protected Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index(Request $request): View
    {
        $products = $this->product->all();
        $successMessage = $request->session()->get('message.success');
        $errorMessage = $request->session()->get('message.error');

        return view('products.index', compact('products', 'successMessage', 'errorMessage'));
    }

    public function create(): View
    {
        return view('products.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $product = $this->product->create($request->all());
        $request->session()->flash('message.success', "Produto '{$product->name}' adicionado com sucesso");

        return redirect()->route('products.index');
    }

    public function edit(string $id): View|RedirectResponse
    {
        $product = $this->product->find($id);

        return $product
            ? view('products.edit', compact('product'))
            : redirect()->route('products.index')->with('message.error', 'Produto não encontrado');
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $product = $this->product->find($id);

        if ($product) {
            $product->update($request->all());
            session()->flash('message.success', "Produto {$product->name} alterado com sucesso!");
        } else {
            session()->flash('message.error', 'Produto não encontrado');
        }

        return redirect()->route('products.index');
    }

    public function destroy(string $id): RedirectResponse
    {
        $product = $this->product->find($id);

        if ($product) {
            $product->delete();
            session()->flash('message.success', 'Produto excluído com sucesso!');
        } else {
            session()->flash('message.error', 'Produto não encontrado');
        }

        return redirect()->route('products.index');
    }
}
