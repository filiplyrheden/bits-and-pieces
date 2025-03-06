<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    public $timestamps = false;

    protected $fillable = [
        'name',
        'console_id',
        'description',
        'color',
        'connection',
        'price'
    ];

    public function console()
    {
        return $this->belongsTo(Console::class);
    }
}
