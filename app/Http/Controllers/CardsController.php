<?php

namespace App\Http\Controllers;

use App\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CardsController extends Controller
{
    public function index() {
        $cards = Card::paginate(2);

        return view('card.index', compact('cards'));
    }

    public function show(Card $card) {
        $notes = $card->notes()->paginate(3);
        $notes->load('user');

        return view('card.show', compact(['card', 'notes']));
    }

    public function add() {
        return view('card.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required|min:10'
        ]);

        $card = new Card($request->all());

        $card->save();
        $request->session()->flash('status', 'Card added successfully.');

        return redirect('/cards');
    }

    public function edit(Card $card) {
        return view('card.edit', compact('card'));
    }

    public function update(Request $request, Card $card) {
        $this->validate($request, [
            'title' => 'required|min:10'
        ]);

        $card->update($request->all());
        $request->session()->flash('status', 'Card edited successfully.');

        return redirect('/cards');
    }

    public function delete(Request $request, Card $card) {
        $card->delete();
        $request->session()->flash('status', 'Card deleted successfully.');

        return redirect('/cards/');
    }
}
