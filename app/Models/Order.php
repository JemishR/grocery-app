<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Order extends Model {protected $fillable=['order_number','customer_name','mobile','address','city','pincode','subtotal','delivery_charge','total','status','notes'];protected $casts=['subtotal'=>'decimal:2','delivery_charge'=>'decimal:2','total'=>'decimal:2'];public function items(){return $this->hasMany(OrderItem::class);}}
