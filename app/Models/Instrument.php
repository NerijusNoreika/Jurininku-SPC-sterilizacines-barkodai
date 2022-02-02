<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instrument extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'instrument_index', 'instrument_category_id'];

    public function charges() {
        return $this->belongsToMany(DeviceCharge::class, 'device_charge_instrument', 'instrument_id', 'device_charge_id')->withPivot('instrument_count_per_charge');
    }

    public function category() {
        return $this->belongsTo(InstrumentCategory::class, 'instrument_category_id');
    }
}
