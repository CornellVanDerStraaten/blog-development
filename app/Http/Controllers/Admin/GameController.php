<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\GameStatus;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.games.index', [
            'ooGames' => Game::with('gameStatus', 'gameReviews')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $oGame = new Game();
        $ooGameStatuses = GameStatus::all();

        return view('admin.games.create', [
            'oGame' => $oGame,
            'ooGameStatuses' => $ooGameStatuses
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $oGame = Game::createGame($request->all());

        if ($oGame) {
            return redirect()->route('admin.games.index')->with('success', 'Game created successfully');
        }

        return redirect()->back()->with('error', 'something went wrong');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $oGame)
    {
        $ooGameStatuses = GameStatus::all();
        return view('admin.games.show', [
            'oGame' => $oGame,
            'ooGameStatuses' => $ooGameStatuses
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $oGame)
    {
        $ooGameStatuses = GameStatus::all();

        return view('admin.games.edit', [
            'oGame' => $oGame,
            'ooGameStatuses' => $ooGameStatuses
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $oGame)
    {
        $boolEditSuccess = $oGame->updateGame($request->all());

        if ($boolEditSuccess) {
            return redirect()->route('admin.games.show', $oGame->id)->with('success', 'Game edited successfully');
        }

        return redirect()->back()->with('error', 'something went wrong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $oGame)
    {
        if ($oGame->gameReviews()->exists()) {
            return redirect()->route('admin.games.show', $oGame)->with('error', 'Game could not be deleted. It has one or more reviews.');
        }

        $boolDestroySuccess = $oGame->delete();

        if ($boolDestroySuccess) {
            return redirect()->route('admin.games.index')->with('success', 'Game deleted successfully');
        }

        return redirect()->back()->with('error', 'something went wrong');
    }
}
