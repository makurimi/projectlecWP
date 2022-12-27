<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang_category extends Model
{
    use HasFactory;
    protected $table = 'barang_categories';

    public $timestamps = false;

    protected $fillable = [
        'barang_id',
        'category_id'
    ];

}
