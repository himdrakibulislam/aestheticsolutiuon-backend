<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'addresses';
    protected $fillable = [
        'user_id',
        'fullname',
        'phone',
        'division',
        'district',
        'sub_district',
        'union',
        'holding',
        'area',
        'street_address',
        'zipcode',
        'default',
        
    ];

}
