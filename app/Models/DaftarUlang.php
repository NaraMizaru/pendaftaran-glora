<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarUlang extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'sekolah_id',
        'category_id',
        'type',
        'gender',
        'nomor_urut',
    ];

    protected $primaryKey = 'id';
    public $incrementing = false;  // karena UUID bukan auto increment

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class);
    }

    public function category()  // Perhatikan nama relasi menggunakan 'category'
    {
        return $this->belongsTo(Category::class);  // Relasi dengan model Category
    }
}
