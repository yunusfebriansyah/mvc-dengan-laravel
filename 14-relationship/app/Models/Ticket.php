<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // relationship
    public function event() : BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function bookings() : HasMany
    {
        return $this->hasMany(Booking::class);
    }

}
