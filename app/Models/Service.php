<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 't_layanan';
    protected $guarded = [];
    protected $primary_key = 'id';
    protected $with = ['author'];

    // one to many
    public function groupservice(){
        return $this->hasMany(GroupService::class);
    }
}
