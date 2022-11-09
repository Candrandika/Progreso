<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'image', 'progress'];

    public function user() {
        $this->belongsTo(User::class);
    }
    public function note() {
        $this->hasMany(Note::class);
    }
}
