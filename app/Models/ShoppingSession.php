<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total'
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    public function items(){
        return $this->hasMany(CartItem::class, 'shopping_session_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
