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
    protected $with = ['groupservice'];
    protected $fillable = [
        'gruplayanan_id',
        'nama',
        'deskripsi'
    ];

    // one to one
    public function groupservice(){
        return $this->hasOne(GroupService::class);
    }
}
