<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceCharge extends Model
{
    use HasFactory;

    // protected static function boot() {
    //     parent::boot();
        
    //     DeviceCharge::creating(function($model) {
    //         $currentCharge = DeviceCharge::whereDate('start_date', Carbon::today())->max('charge_index') + 1;
    //         $model->charge_index = $currentCharge;
    //     });
    // }


    public function instruments() {
        return $this->belongsToMany(Instrument::class, 'device_charge_instrument', 'device_charge_id', 'instrument_id')->withPivot('instrument_count_per_charge');
    }

    public function device() {
        return $this->belongsTo(Device::class);
    }
   
    public function user() {
        return $this->belongsTo(User::class);
    }

}
