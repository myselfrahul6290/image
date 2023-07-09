<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class compressionModel extends Model
{
    use HasFactory;

    protected $table='table__photos';
    protected $primarykey='image_id';
}
