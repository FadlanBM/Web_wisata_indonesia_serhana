<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seniTari extends Model
{
    use HasFactory;
    protected $fillable=['name','asal','description','judul','buatan','pencipta','pelaku','rating','foto'];
}
