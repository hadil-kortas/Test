<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Classroom extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'Name',
        'degree',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    protected $table = 'classrooms';

}
