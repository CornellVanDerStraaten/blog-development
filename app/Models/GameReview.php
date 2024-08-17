<?php

namespace App\Models;

use App\Traits\HandleGenericInputs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GameReview extends Model
{
    use HasFactory, HandleGenericInputs;

    protected $guarded = [];

    protected $casts = [
        'is_published' => 'boolean',
        'date' => 'date'
    ];

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    public static function createGameReview(array $aData): GameReview
    {
        $aData = GameReview::handleGenericInputs($aData, new GameReview());

        return GameReview::create($aData);
    }

    public function updateGameReview(array $aData): bool
    {
        $aData = GameReview::handleGenericInputs($aData, $this);

        return $this->update($aData);
    }
}
