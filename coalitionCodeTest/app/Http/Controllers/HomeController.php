<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProduct;
use App\Product;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function getProducts() {
      $products = $this->getAllProducts();
      return view('home', ['products' => $products]);
    }

    public function saveProduct(StoreProduct $request) {
      $product = new Product([
        'product' => $request->input('inputProductName'),
        'quanity' => $request->input('inputQuantityStock'),
        'price' => $request->input('inputPricePerUnit'),
      ]);

      $save = $product->save();
      if ($save) {
        session()->flash('status', 'Product Added!');
        return redirect('/');
      } else {
        session()->flash('status', 'We failed to add the Product! Please try again!');
        return redirect('/');
      }
    }

    protected function getAllProducts () {
      return DB::table('products')
               ->orderBy('created_at', 'asc')
               ->get();
    }

  }
