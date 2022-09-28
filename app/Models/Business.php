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
    protected $with = ['author'];

    public function group(){
        return $this->belongsTo(GroupService::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter($query, array $filters){

    $query->when($filters['search'] ?? false, function($query, $search) {
        return $query->where(function($query) use ($search) {
             $query->where('deskripsi', 'like', '%' . $search . '%')
                    ->orWhere('pemilik', 'like', '%' . $search . '%');
         });
     });

    }

}
