<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class Dokumentasi extends Model    
{
    use HasFactory;
    use LogsActivity;

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

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['lampiran', 'tanggal', 'nomor', 'perihal', 'deskripsi', 'status_id']);
    }

}
