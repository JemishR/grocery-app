<?php
namespace App\Http\Controllers;
use App\Models\Order;use Illuminate\Http\Request;use Illuminate\Support\Str;
class CheckoutController extends Controller {
 public function create(){ $cart=session('cart',[]);abort_if(!$cart,redirect('/products'));$subtotal=collect($cart)->sum(fn($x)=>$x['price']*$x['quantity']);return view('checkout.create',compact('cart','subtotal')); }
 public function store(Request $r){
  $d=$r->validate(['customer_name'=>'required|max:100','mobile'=>'required|regex:/^[0-9]{10}$/','address'=>'required|max:1000','city'=>'required|in:Surat,surat','pincode'=>'required|regex:/^[0-9]{6}$/','notes'=>'nullable|max:1000']);
  $cart=session('cart',[]);abort_if(!$cart,redirect('/products'));$subtotal=collect($cart)->sum(fn($x)=>$x['price']*$x['quantity']);
  $order=Order::create(array_merge($d,['city'=>'Surat','order_number'=>'SG-'.strtoupper(Str::random(8)),'subtotal'=>$subtotal,'delivery_charge'=>0,'total'=>$subtotal,'status'=>'new']));
  foreach($cart as $item)$order->items()->create(['product_id'=>$item['id'],'product_name'=>$item['name'],'unit'=>$item['unit'],'price'=>$item['price'],'quantity'=>$item['quantity'],'line_total'=>$item['price']*$item['quantity']]);
  session()->forget('cart');return redirect()->route('orders.success',$order);
 }
 public function success(Order $order){return view('orders.success',compact('order'));}
}