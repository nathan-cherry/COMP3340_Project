<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    // Table Name
    protected $table = 'cart';
    // PK
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User')->withDefault();
    }

    public function product()
    {
        return $this->belongsTo('App\Product')->withDefault();
    }
}
