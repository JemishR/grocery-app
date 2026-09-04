<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;use App\Models\{Product,Category};use Illuminate\Http\Request;use Illuminate\Support\Str;
class ProductController extends Controller {
 public function index(){return view('admin.products.index',['products'=>Product::with('category')->latest()->paginate(20)]);}
 public function create(){return view('admin.products.form',['product'=>new Product,'categories'=>Category::where('is_active',1)->get()]);}
 public function store(Request $r){$d=$r->validate(['category_id'=>'required|exists:categories,id','name'=>'required|max:150','description'=>'nullable','price'=>'required|numeric|min:0','unit'=>'required|max:50','stock'=>'required|integer|min:0']);$d['slug']=Str::slug($d['name']);$d['is_active']=$r->boolean('is_active');Product::create($d);return redirect('/admin/products')->with('success','Product created.');}
 public function edit(Product $product){return view('admin.products.form',['product'=>$product,'categories'=>Category::where('is_active',1)->get()]);}
 public function update(Request $r,Product $product){$d=$r->validate(['category_id'=>'required|exists:categories,id','name'=>'required|max:150','description'=>'nullable','price'=>'required|numeric|min:0','unit'=>'required|max:50','stock'=>'required|integer|min:0']);$d['slug']=Str::slug($d['name']).'-'.$product->id;$d['is_active']=$r->boolean('is_active');$product->update($d);return redirect('/admin/products')->with('success','Product updated.');}
 public function destroy(Product $product){$product->delete();return back()->with('success','Product deleted.');}
}