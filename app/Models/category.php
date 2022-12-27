<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['name','namabarang',
    'images'];

    public function barangs(){
        return $this->hasMany(barang::class, 'category_id','id');
    }
}
