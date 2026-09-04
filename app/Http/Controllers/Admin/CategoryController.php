<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;use App\Models\Category;use Illuminate\Http\Request;use Illuminate\Support\Str;
class CategoryController extends Controller {
 public function index(){return view('admin.categories.index',['categories'=>Category::withCount('products')->get()]);}
 public function create(){return view('admin.categories.form',['category'=>new Category]);}
 public function store(Request $r){$d=$r->validate(['name'=>'required|max:100']);Category::create(['name'=>$d['name'],'slug'=>Str::slug($d['name']),'is_active'=>$r->boolean('is_active')]);return redirect('/admin/categories')->with('success','Category created.');}
 public function edit(Category $category){return view('admin.categories.form',compact('category'));}
 public function update(Request $r,Category $category){$d=$r->validate(['name'=>'required|max:100']);$category->update(['name'=>$d['name'],'slug'=>Str::slug($d['name']), 'is_active'=>$r->boolean('is_active')]);return redirect('/admin/categories')->with('success','Category updated.');}
 public function destroy(Category $category){$category->delete();return back()->with('success','Category deleted.');}
}