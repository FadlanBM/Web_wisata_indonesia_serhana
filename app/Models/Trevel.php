<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trevel extends Model
{
    use HasFactory;
    protected $fillable=['name','judul','description','biaya','foto'];

}
