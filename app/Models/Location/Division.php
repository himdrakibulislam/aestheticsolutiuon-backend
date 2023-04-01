<?php

namespace App\Models\Location;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;
    protected $table = 'divisions';
    protected $fillable = ['division_name'];

    protected $with=['districts'];
    public function districts(){
        return $this->hasMany(District::class,'division_id','id');
    }
}
