<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productsinfo extends Model
{
    public $fillable = ['productname','productimage', 'token', 'descriptions_product'];

}
