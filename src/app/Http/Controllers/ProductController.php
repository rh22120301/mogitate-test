<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Season;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products =Product::Paginate(6);

        return view('index',compact('products'));
    }

    public function register()
    {
        $seasons =Season::all();
        return view('register',compact('seasons'));
    }

    public function store(ProductRequest $request)
    {
    $data = $request->only(['name', 'price', 'description']);
    $data['image'] = $request->file('image')->store('products', 'public');
    $product = Product::create($data);
    $product->seasons()->sync($request->seasons ?? []);

    return redirect('/products');
    }

    public function detail($id)
    {
        $product = Product::findOrFail($id);
        $seasons =Season::all();
        
        return view('detail', compact('product', 'seasons'));
    }

    public function update(ProductRequest $request) 
    {
        $product = Product::findOrFail($request->id); 
        $data = $request->only(['name', 'price', 'description']); 
        $data['image'] = $request->file('image')->store('products', 'public'); 
        $product->update($data); 
        $product->seasons()->sync($request->seasons ?? []); 
        
        return redirect('/products');

    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword'); 
        $sort = $request->input('sort');
        $query = Product::KeywordSearch($keyword);

        if ($sort === 'asc' || $sort === 'desc') { $query->orderBy('price', $sort); }
        $products = $query ->Paginate(6);

        return view('index', compact('products'));
    }

    public function destroy(Request $request)
    {
        Product::find($request->id)->delete();
        return redirect('/products')->with('message', 'Todoを削除しました');
    }

}