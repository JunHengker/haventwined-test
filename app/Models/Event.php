<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'event_date',
        'registration_start',
        'registration_end',
        'time_start',
        'time_end',
        'participant_estimate',
        'location',
        'city',
        'detailed_location',
        'image',
        'created_by',
    ];

    protected $casts = [
        'event_date' => 'date',
        'registration_start' => 'date',
        'registration_end' => 'date',
        'time_start' => 'string',
        'time_end' => 'string',
        'participant_estimate' => 'integer',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}