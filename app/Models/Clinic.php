<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    protected $table      = 'clinics';
    protected $fillable   = ['fees', 'speciality', 'location', 'description', 'doctor_id', 'created_at', 'updated_at'];
    public $timestamps    = true;

    ##--------------------------------- RELATIONSHIPS
    public function doctor() {
        return $this->belongsTo("\App\Models\Doctor", 'doctor_id', 'id');
    }

    public function reservations() {
        return $this->hasMany("\App\Models\Reservation", 'clinic_id', 'id');
    }
}
