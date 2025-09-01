<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quizzes';
    protected $fillable = [
        'course_module_id',
        'question',
        'option_one',
        'option_two',
        'option_three',
        'option_four',
        'correct_answer',
        'created_at',
        'updated_at',
    ];
}
