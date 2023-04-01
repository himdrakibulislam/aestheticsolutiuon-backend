<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'brand',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'quantity',
        'trending',
        'status',
        'sizes',
        'meta_title',
        'meta_keyword',
        'meta_description',
    ];
    protected $with = ['category','brands','productImages'];
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
 
    public function brands(){
        return $this->belongsTo(Brand::class,'brand','id');
    }
    public function productImages(){
        return $this->hasMany(ProductImage::class,'product_id','id');
    }
}
