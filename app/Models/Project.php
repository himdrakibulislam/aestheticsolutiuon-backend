<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $fillable = [
        'author_id',
        'location',
        'photograph',
        'sector',
        'description',
        'slug',
        'meta_title',
        'meta_keyword',
        'meta_description'
        
    ];
    protected $with = ['projectImages'];
    
    public function projectImages(){
        return $this->hasMany(ProjectImage::class,'project_id','id');
    }
    protected $hidden = [
        'author_id',
    ];
    
}
