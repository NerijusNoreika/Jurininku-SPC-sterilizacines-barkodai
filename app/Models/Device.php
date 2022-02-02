<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;


    public function charges() {
        return $this->hasMany(DeviceCharge::class);
    }

    public function chargesToday() {
        return $this->hasMany(DeviceCharge::class)->whereDate('start_date', Carbon::today());
    }

    public function instruments() {
        return $this->hasManyThrough(DeviceCharge::class, Instrument::class);
    }

    
    /**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeToday($query) {

        return $query->where('start_date', '=', Carbon::today()->toDateString());
    }

    public function departments() {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
    
}
