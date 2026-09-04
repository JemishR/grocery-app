<?php
namespace App\Http\Controllers;
use App\Models\{Category,Product};use Illuminate\Http\Request;
class StoreController extends Controller {
 public function home(){return view('home.index',['categories'=>Category::where('is_active',1)->withCount('products')->get(),'products'=>Product::where('is_active',1)->latest()->take(8)->get()]);}
 public function products(Request $r){$q=$r->input('q');$products=Product::where('is_active',1)->when($q,fn($x)=>$x->where('name','like',"%$q%"))->with('category')->paginate(12)->withQueryString();return view('products.index',compact('products','q'));}
 public function show(Product $product){abort_unless($product->is_active,404);return view('products.show',compact('product'));}
}