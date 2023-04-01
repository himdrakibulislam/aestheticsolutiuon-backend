<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
class Social extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table  ='socials';
    protected $fillable = [
        'name',
        'email',
        'social_type',
        'photoURL',
        'email_verified_at'
    ];
    protected $with =['address','orders'];
    public function address(){
        return $this->hasMany(Address::class,'user_id','id');
    }

    public function orders(){
        return $this->hasMany(Order::class,'user_id','id');
    }
    
}
