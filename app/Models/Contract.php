<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $table = "contracts";
    protected $fillable = [
        'name',
        'email',
        'service_type',
        'budget',
        'description',
        'es_time',
        'ip',
    ];

}
