<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    // Table Name
    protected $table = 'theme';
    // PK
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}
