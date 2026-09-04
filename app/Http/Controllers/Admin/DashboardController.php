<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;use App\Models\{Order,Product};
class DashboardController extends Controller {public function index(){return view('admin.dashboard.index',['orderCount'=>Order::count(),'newCount'=>Order::where('status','new')->count(),'productCount'=>Product::count(),'orders'=>Order::latest()->take(10)->get()]);}}
