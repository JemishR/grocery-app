<?php
namespace App\Http\Controllers;
use App\Models\Product;use Illuminate\Http\Request;
class CartController extends Controller {
 private function cart(){return session('cart',[]);}
 public function index(){ $cart=$this->cart();$total=collect($cart)->sum(fn($x)=>$x['price']*$x['quantity']);return view('cart.index',compact('cart','total')); }
 public function add(Product $product){$cart=$this->cart();$qty=($cart[$product->id]['quantity']??0)+1;$cart[$product->id]=['id'=>$product->id,'name'=>$product->name,'unit'=>$product->unit,'price'=>(float)$product->price,'quantity'=>min($qty,$product->stock)];session(['cart'=>$cart]);return back()->with('success',$product->name.' added to cart.');}
 public function update(Request $r,Product $product){$cart=$this->cart();if(isset($cart[$product->id]))$cart[$product->id]['quantity']=max(1,min((int)$r->input('quantity'),$product->stock));session(['cart'=>$cart]);return back();}
 public function remove(Product $product){$cart=$this->cart();unset($cart[$product->id]);session(['cart'=>$cart]);return back();}
}