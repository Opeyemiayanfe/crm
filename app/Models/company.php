<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    protected $primaryKey = 'company_id';
    public $timestamps = false;
    use HasFactory;
}
