<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;

    protected $table = 't_platform';
    protected $guarded = ['id'];
    // protected $fillable = [
    //     'deskripsi'
    // ];
}
