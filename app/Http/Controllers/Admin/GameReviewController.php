<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GameReview\GameReviewStoreRequest;
use App\Http\Requests\Admin\GameReview\GameReviewUpdateRequest;
use App\Models\Game;
use App\Models\GameReview;
use Illuminate\Http\Request;

class GameReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.game_reviews.index', [
            'ooGameReviews' => GameReview::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $oGameReview = new GameReview();

        if ($request->game_id) {
            $oGameReview->game_id = $request->game_id;
        }
        $ooGames = Game::all();

        return view('admin.game_reviews.create', [
            'oGameReview' => $oGameReview,
            'ooGames' => $ooGames
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GameReviewStoreRequest $request)
    {
        $oGameReview = GameReview::createGameReview($request->all());

        if ($oGameReview) {
            return redirect()->route('admin.game-reviews.index')->with('success', 'Game Review created successfully');
        }

        return redirect()->back()->with('error', 'something went wrong');
    }

    /**
     * Display the specified resource.
     */
    public function show(GameReview $oGameReview)
    {
        $ooGames = Game::all();
        return view('admin.game_reviews.show', [
            'oGameReview' => $oGameReview,
            'ooGames' => $ooGames
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GameReview $oGameReview)
    {
        $ooGames = Game::all();
        return view('admin.game_reviews.edit', [
            'oGameReview' => $oGameReview,
            'ooGames' => $ooGames
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GameReviewUpdateRequest $request, GameReview $oGameReview)
    {
        $boolEditSuccess = $oGameReview->updateGameReview($request->all());

        if ($boolEditSuccess) {
            return redirect()->route('admin.game-reviews.show', $oGameReview->id)->with('success', 'Game Review edited successfully');
        }

        return redirect()->back()->with('error', 'something went wrong');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GameReview $oGameReview)
    {
        $boolDestroySuccess = $oGameReview->delete();

        if ($boolDestroySuccess) {
            return redirect()->route('admin.game-reviews.index')->with('success', 'Game Review deleted successfully');
        }

        return redirect()->back()->with('error', 'something went wrong');
    }
}
