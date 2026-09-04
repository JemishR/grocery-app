<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;use Illuminate\Support\Str;use App\Models\{User,Category,Product};
class DatabaseSeeder extends Seeder {
 public function run():void {
  User::updateOrCreate(['email'=>'admin@suratgrocery.test'],['name'=>'Store Admin','password'=>'password']);
  $cats=['Fruits & Vegetables','Dairy & Paneer','Rice, Wheat & Atta','Cooking Oil','Fresh Herbs','Dry Fruits & Nuts','Fresh Juices','Vegetarian Snacks'];
  $ids=[];foreach($cats as $name)$ids[$name]=Category::updateOrCreate(['slug'=>Str::slug($name)],['name'=>$name,'is_active'=>true])->id;
  $items=[
   ['Fruits & Vegetables','Fresh Potato',40,'1 kg'],['Fruits & Vegetables','Fresh Tomato',50,'1 kg'],['Fruits & Vegetables','Onion',45,'1 kg'],['Fruits & Vegetables','Carrot',60,'1 kg'],
   ['Dairy & Paneer','Fresh Paneer',110,'200 g'],['Dairy & Paneer','Fresh Curd',55,'500 g'],['Rice, Wheat & Atta','Basmati Rice',320,'5 kg'],['Rice, Wheat & Atta','Wheat Atta',280,'5 kg'],
   ['Cooking Oil','Sunflower Oil',150,'1 litre'],['Cooking Oil','Groundnut Oil',190,'1 litre'],['Fresh Herbs','Coriander',20,'1 bunch'],['Fresh Herbs','Mint Leaves',15,'1 bunch'],
   ['Dry Fruits & Nuts','Almonds',180,'200 g'],['Dry Fruits & Nuts','Cashews',190,'200 g'],['Fresh Juices','Orange Juice',80,'1 litre'],['Vegetarian Snacks','Potato Chips',40,'1 pack']
  ];
  foreach($items as [$cat,$name,$price,$unit])Product::updateOrCreate(['slug'=>Str::slug($name)],['category_id'=>$ids[$cat],'name'=>$name,'description'=>'Fresh quality '.$name.'.','price'=>$price,'unit'=>$unit,'stock'=>100,'is_active'=>true]);
 }
}