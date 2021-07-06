<?php

namespace App\Http\Controllers;

use App\Card;
use App\Note;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotesController extends Controller
{
    public function store(Request $request, Card $card) {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $note = new Note($request->all());
        $card->addNote($note, \Auth::id());
        $request->session()->flash('status', 'Note added successfully.');

        return back();
    }

    public function edit(Note $note) {
        return view('note.edit', compact('note'));
    }

    public function update(Request $request, Note $note) {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $note->update($request->all());
        $request->session()->flash('status', 'Note edited successfully.');

        return redirect('/card/' . $note->card_id);
    }

    public function delete(Request $request, Note $note) {
        $note->delete();
        $request->session()->flash('status', 'Note deleted successfully.');

        return redirect('/card/' . $note->card_id);
    }
}