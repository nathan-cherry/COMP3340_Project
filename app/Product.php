<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Table Name
    protected $table = 'products';
    // PK
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}
