<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clubs extends Model
{
    use HasFactory;

    protected $table = 'clubs';
    protected $fillable = [
        'name',
        'founded',
        'description',
        'president',
        'contact_email',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'club_user', 'club_id', 'user_id')
            ->withPivot('role')
            ->withTimestamps();
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}