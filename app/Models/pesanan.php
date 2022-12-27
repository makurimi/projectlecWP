<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function pesanan_detail(){
        return $this->hasMany(pesanandetail::class,'pesanan_id','id');
    }

    public function barangs(){

        return $this->hasMany(barang::class,'barang_id','id');
    }

}
