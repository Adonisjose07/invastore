<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'shopping_session_id',
        'product_id',
        'quantity'
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected static function booted(){

        static::created(function($cartItem){
            self::updateTotals($cartItem);
        });
        static::updated(function($cartItem){
            self::updateTotals($cartItem);
        });
        static::deleted(function($cartItem){
            self::updateTotals($cartItem);
        });
    }

    private static function updateTotals($cartItem){
        $cart = ShoppingSession::find($cartItem->shopping_session_id);
        $totals = 0;
        foreach($cart->items as $item){
            $totals += $item->product->price * $item->quantity;
        }

        $cart->total = $totals;
        $cart->save();
    }

    public function cart(){
        return $this->belongsTo(ShoppingSession::class, 'shopping_session_id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }

}
