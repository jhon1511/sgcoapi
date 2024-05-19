<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matriculacion extends Model
{
    use HasFactory;
    protected $table = 'matriculaciones';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
