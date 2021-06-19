<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Predmet;

class Quizresult extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'predmet_id',
        'right_answers',
        'wrong_answers',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function predmet(){
        return $this->belongsTo(Predmet::class);
    }
}
