<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstrumentCategory extends Model
{
    use HasFactory;

    protected $fillable = ['short_name', 'long_name'];

    public function instruments()
    {
        return $this->hasMany(Instrument::class);
    }
}
