<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 't_layanan';
    protected $guarded = ['id'];
    // protected $fillable = [
    //     'gruplayanan_id',
    //     'nama',
    //     'deskripsi'
    // ];
    protected $with = ['groupservice'];

    public function groupservice(){
        return $this->belongsTo(GroupService::class, 'gruplayanan_id');
    }
}
