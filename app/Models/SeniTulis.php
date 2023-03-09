<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeniTulis extends Model
{
    use HasFactory;
    protected $fillable=['name','asal','description','judul','buatan','rating','foto'];

}
