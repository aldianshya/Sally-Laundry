<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListHarga extends Model
{
    use HasFactory;

    protected $table = 'list_harga';

    protected $fillable = ['layanan_laundry_id', 'waktu', 'harga'];


    public function layananlaundry()
    {
        return $this->belongsTo(LayananLaundry::class, 'layanan_laundry_id');
    }
}
