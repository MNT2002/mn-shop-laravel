<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = true;
    // protected $dateFormat = 'h:m:s';

    protected $fillable = ['id', 'name', 'email', 'password', 'confirm_password', 'quyen', 'image_path'];

}
