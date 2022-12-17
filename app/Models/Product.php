<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $perPage = 12;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'active',
        'price',
        'description',
        'type',
        'category_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];
    
    public function category(){
        return $this->belongsTo(ProductCategories::class, 'category_id');
    }

    public function gallery(){
        return $this->hasMany(ProductMedia::class, 'product_id');
    }
    public function getFeaturedImage(){
        foreach( $this->productMedia as $pm ){
            if($pm->featured){
                return $pm->url;
            }
        }
        return '#';
    }
    public function productMedia(){
        return $this->hasMany(ProductMedia::class, 'product_id');
    }
}

