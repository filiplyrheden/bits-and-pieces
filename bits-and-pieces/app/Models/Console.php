<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Console extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'manufacturer',
        'platform'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
