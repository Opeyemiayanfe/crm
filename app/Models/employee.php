<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    protected $primaryKey = 'employee_id';
    public $timestamps = false;
    use HasFactory;
}
