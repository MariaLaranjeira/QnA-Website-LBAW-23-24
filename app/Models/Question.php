<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Question extends Model {

    public $timestamps  = false;
    public $table = 'question';
    public $primaryKey = 'question_id';
    protected $fillable = [
        'question_id',
        'title',
        'text_body',
        'media_address',
        'creation_date',
        'rating',
        'id_user',
    ];

    public function owner() {
        return $this->belongsTo('App\Models\User');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'question_tag', 'id_question', 'id_tag');
    }
}