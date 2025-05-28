<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananLaundry extends Model
{
    use HasFactory;

    protected $table = 'Layanan_Laundry';

    protected $fillable = ['user_id', 'nama_layanan', 'kategori'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function listHarga()
{
    return $this->hasMany(ListHarga::class, 'layanan_laundry_id');
}

}
