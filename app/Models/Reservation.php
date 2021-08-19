<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kamar;
use App\Models\Jeniskamar;
use Illuminate\Support\Facades\DB;

class Reservation extends Model
{
    use HasFactory;

      public function getLamaAttribute($value)
  {
      $tanggalmasuk = $this->attributes['tanggalmasuk'];
      $tanggalmasuk = strtotime($tanggalmasuk);
      $tanggalkeluar = $this->attributes['tanggalkeluar'];
      $tanggalkeluar = strtotime($tanggalkeluar);
      $value = ($tanggalkeluar-$tanggalmasuk)/86400;
      return $value;
  }

  public function getHargaAttribute($value)
{
    $nomorkamar = $this->attributes['kamar']; //pilih nomor kamar yg dipesan
    $kamar = Kamar::where('id',$nomorkamar)->first(); //pilih baris kamar dipilih
    $jenis = $kamar->jenis; //pilih jenis kamarnya
    $harga = Jeniskamar::where('id',$jenis)->first();
    $harga = $harga->harga;
    $tanggalmasuk = $this->attributes['tanggalmasuk'];
    $tanggalmasuk = strtotime($tanggalmasuk);
    $tanggalkeluar = $this->attributes['tanggalkeluar'];
    $tanggalkeluar = strtotime($tanggalkeluar);
    $jumlahhari = ($tanggalkeluar-$tanggalmasuk)/86400;
    $total = $harga*$jumlahhari;
    $total = "Rp " . number_format($total,2,',','.');
    $value = $total;

    return $value;
}

  public function getJeniskamarAttribute($value)
  {
    $nomorkamar = $this->attributes['kamar']; //pilih nomor kamar yg dipesan
    $kamar = Kamar::where('id',$nomorkamar)->first(); //pilih baris kamar dipilih
    $jeniskamar = $kamar->jenis; //pilih jenis kamarnya
    $jeniskamar = Jeniskamar::where('id',$jeniskamar)->first();
    $value = $jeniskamar->jenis;
    return $value;
  }
}
