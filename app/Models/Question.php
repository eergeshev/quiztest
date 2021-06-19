<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Predmet;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'option0',
        'option1',
        'option2',
        'option3',
        'answer',
        'predmet_id'
    ];

    public function predmet(){
        return $this->belongsTo(Predmet::class);
    }
}
