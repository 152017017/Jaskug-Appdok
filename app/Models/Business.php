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

    public function bisnis(){
        return $this->hasMany(Business::class);
    }
}
