<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Laundry;
use App\Models\Denganstruk;

class Denganstruk extends Model
{
    use HasFactory;

    public function getTotalAttribute($value) {
      $jumlah = $this->attributes['jumlah'];
      $id =  $this->attributes['produk'];
      $produk = Laundry::where('id',$id)->first();
      $harga = $produk->harga;
      $value = $jumlah*$harga;
      $id = $this->attributes['id'];
      $denganstruk = Denganstruk::find($id);
      $denganstruk->total = $value;
      $denganstruk->save();
      return $value;
    }
}
