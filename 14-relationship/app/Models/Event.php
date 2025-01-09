<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;
    // mass assignment
    protected $guarded = ['id'];


    // relationship
    public function organizer() : BelongsTo
    {
        return $this->belongsTo(Organizer::class);
    }



}
