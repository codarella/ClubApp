<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['club_id', 'title', 'date', 'description'];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }
}
