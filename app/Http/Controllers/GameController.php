<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GameCategory;
use Illuminate\Http\Request;

class GameController extends Controller
{

    public function create($category_id)
    {
        $category = GameCategory::find($category_id);
        return view('pages.newGame', ['category' => $category]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $game = Game::findOrFail($id);
        $questions = $game->questions()->paginate(5);
        return view('pages.game', ['game' => $game, 'questions' => $questions]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:256|unique:game',
            'description' => 'required'
        ]);
        
        $game = Game::create([
            'name' => $request->input('name'),
            'description' => trim($request->input('description')),
            'nr_members' => 0,
            'game_category_id' => $request->category_id
        ]);

        return response()->json(['id' => $game->id]);
    }


    public function delete(Request $request, $id) {

        $game = Game::find($id);
        
        if (!$game) {
            abort(404);
        }
       
        $game->delete();

        return response()->json(['id' => $game->id ]); 
    }

}
