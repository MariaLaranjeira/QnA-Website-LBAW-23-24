<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuestionTag extends Model {

    public $timestamps  = false;
    public $table = 'question_tag';
    public $primaryKey = ['id_question', 'id_tag'];
    protected $fillable = [
        'id_question',
        'id_tag',
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo('App\Models\Question');
    }

    public function tag(): BelongsTo
    {
        return $this->belongsTo('App\Models\Tag');
    }
}