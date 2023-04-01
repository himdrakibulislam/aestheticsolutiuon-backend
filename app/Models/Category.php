<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table  = 'categories';
    protected $fillable = [
            'name',
            'slug',
            'description',
            'image',
            'meta_title',
            'meta_keyword',
            'meta_description',
            'status',
    ];
    // protected $with = ['products'];
    public function products(){
        return $this->hasMany(Product::class,'category_id','id');
    }
}