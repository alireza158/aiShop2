<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = ['category_id','name','slug','image','gallery','short_description','description','price','discount_price','stock','brand','rating','is_featured','is_active','sales_count','features'];
    protected $casts = ['gallery'=>'array','features'=>'array','price'=>'decimal:2','discount_price'=>'decimal:2','rating'=>'decimal:1','is_featured'=>'boolean','is_active'=>'boolean'];
    public function category(): BelongsTo { return $this->belongsTo(Category::class); }
    public function getFinalPriceAttribute(): float { return (float) ($this->discount_price ?: $this->price); }
    public function getDiscountPercentAttribute(): int { return $this->discount_price ? (int) round((($this->price - $this->discount_price) / $this->price) * 100) : 0; }
}
