<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_product extends Model
{
    use HasFactory;
    protected $table = 'tbl_category_product';
    protected $primaryKey = 'category_id';
    public $timestamps = true;
}
