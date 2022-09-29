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

    public function groupservice(){
        return $this->belongsTo(GroupService::class);
    }
}
