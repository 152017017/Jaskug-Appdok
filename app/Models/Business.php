<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $table = 't_bisnis';
    protected $guarded = [];
    protected $primary_key = 'id';
    protected $with = ['group'];
    protected $fillable = 
    [
        'deskripsi',
        'pemilik'
    ];

    public function group(){
        return $this->hasOne(GroupService::class);
    }

}
