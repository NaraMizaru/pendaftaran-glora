<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['nama'];

    public function daftarUlangs()
    {
        return $this->hasMany(DaftarUlang::class);
    }
}
