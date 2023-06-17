<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scrapplinks extends Model
{
    public $fillable = ['product_id','bussine_id','captive_link'];
}
