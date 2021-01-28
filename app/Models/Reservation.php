<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table      = 'reservations';
    protected $fillable   = ['user_id', 'clinic_id', 'status', 'created_at', 'updated_at'];
    public $timestamps    = true;

    ##--------------------------------- RELATIONSHIPS
    public function clinic() {
        return $this->belongsTo("\App\Models\Clinic", 'clinic_id', 'id');
    }

    public function user() {
        return $this->belongsTo("\App\Models\User", 'user_id', 'id');
    }    
}
