<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupService extends Model
{
    use HasFactory;
    
    protected $table = 't_grup_layanan';
    protected $guarded = [];
    protected $primary_key = '';
    protected $fillable = 
    [
        'bisnis_id',
        'deskripsi'
    ];
    protected $with = [];

    public function service(){
        return $this->hasMany(Service::class);
    }    

    public function business()
    {
        return $this->belongsTo(Business::class, 'bisnis_id');
    }
    
}
