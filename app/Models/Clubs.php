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
        return $this->belongsToMany(User::class,foreignPivotKey:"clubs_id");
    }
}