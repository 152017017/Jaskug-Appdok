<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $table = 't_bisnis';
    protected $guarded = ['id'];
    // protected $fillable = [
    //     'deskripsi',
    //     'pemilik'
    // ];

    public function group(){
        return $this->hasOne(GroupService::class);
    }

}
