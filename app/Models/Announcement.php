<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = ['club_id', 'title', 'content'];

    public function clubs()
    {
        return $this->belongsTo(Clubs::class);
    }
}
