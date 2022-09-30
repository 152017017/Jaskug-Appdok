<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupService extends Model
{
    use HasFactory;
    
    protected $table = 't_grup_layanan';
    protected $guarded = [];
    protected $primary_key = 'id';

    // one to one
    public function service(){
        return $this->belongsTo(Service::class);
    }
    
    // one to many
    public function business(){
        return $this->hasMany(Business::class);
    }
    
}
