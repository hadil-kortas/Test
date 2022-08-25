<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Student extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'Firstname',
        'lastname',
        'pseudopassword',
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    protected $table = 'students';
}
