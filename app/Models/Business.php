<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $table = 't_bisnis';
    protected $guarded = ['id'];
    protected $primary_key = 'id';

    public function group(){
        return $this->belongsTo(GrupService::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
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
