<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    public function schedules() {
        return $this->hasMany( Schedule::class );
    }
    public function bookings() {
        return $this->hasMany( Booking::class );
    }
    public function seatplane() {
        return $this->hasMany( SeatPlan::class );
    }
    protected $fillable = ['name', 'registration_number'];
}
