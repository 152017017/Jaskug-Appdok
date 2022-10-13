<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model  
{
    use HasFactory;

    protected $table = 't_dokumentasi';
    protected $guarded = ['id'];
    protected $with = ['service', 'business', 'groupservice', 'status', 'platform'];

    public function service(){
        return $this->belongsTo(Service::class, 'layanan_id');
    }

    public function business(){
        return $this->belongsTo(Business::class, 'bisnis_id');
    }

    public function groupservice(){
        return $this->belongsTo(GroupService::class, 'gruplayanan_id');
    }

    public function status(){
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function platform(){
        return $this->belongsTo(Platform::class, 'platform_id');
    }

}
