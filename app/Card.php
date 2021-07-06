<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = ['title'];

    public function notes() {
        return $this->hasMany(Note::class);
    }

    public function addNote(Note $note, $id) {
        $note->user_id = $id;
        return $this->notes()->save($note);
    }
}
