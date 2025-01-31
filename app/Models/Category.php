<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'nama_kategori',
        'kuota_wira',
        'kuota_madya',
    ];

    public function daftarUlangs()
    {
        return $this->belongsToMany(DaftarUlang::class, 'daftar_ulang_categories', 'category_id', 'daftar_ulang_id');
    }
}
