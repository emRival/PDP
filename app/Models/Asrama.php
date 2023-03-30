<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asrama extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'asrama';
    protected $fillable = [
        'nama_asrama',
    ];
}
