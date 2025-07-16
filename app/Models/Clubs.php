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
        return $this->belongsToMany(User::class,foreignPivotKey:"clubs_id")
        ->withPivot('role')
        ->withTimestamps();
    }

    public function admins()
    {
        return $this->belongsToMany(User::class, 'club_user', 'clubs_id', 'user_id')
            ->wherePivot('role', 'admin')
            ->withTimestamps();
    }

    public function president()
    {
        return $this->belongsToMany(User::class, 'club_user', 'clubs_id', 'user_id')
            ->wherePivot('role', 'president')
            ->withTimestamps();
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }
}