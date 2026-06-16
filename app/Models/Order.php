<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Order extends Model { protected $fillable=['order_number','customer_name','customer_phone','address','city','province','postal_code','notes','payment_method','total_price','discount_amount','final_price','status']; protected $casts=['total_price'=>'decimal:2','discount_amount'=>'decimal:2','final_price'=>'decimal:2']; public function items(): HasMany { return $this->hasMany(OrderItem::class); } }
