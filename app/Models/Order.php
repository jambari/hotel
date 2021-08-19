<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Laundry;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
    'customer_name',
    'customer_email',
];
    public function laundries()
{
    return $this->belongsToMany(Laundry::class)->withPivot(['quantity']);
}
}
