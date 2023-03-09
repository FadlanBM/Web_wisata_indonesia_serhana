<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wisata extends Model
{
    use HasFactory;
    protected $fillable=['name','lokasi','desa','description','judul','fasilitas','rating','foto'];
}
