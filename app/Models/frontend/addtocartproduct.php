<?php

namespace App\Models\frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addtocartproduct extends Model
{
    use HasFactory;
  protected $table = "addtocartproduct";
  protected $primaryKey = "Product_id";
}
