<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    
    protected $fillable = [
        'title',
        'slug',
        'author_id',
        'short_description',
        'description',
        'banner',
        'status',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected $hidden = [
        'author_id',
    ];
    protected $with =['admin'];
    public function admin(){
    return $this->belongsTo(Admin::class,'author_id','id');
    }
    // public function comments(){
    // return $this->hasMany(Comment::class);
    // }
    
    
}
