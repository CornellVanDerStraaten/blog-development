<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rating',
        'game_status_id',
        'is_published'
    ];

    protected $casts = [
        'is_published' => 'boolean'
    ];

    public function gameReviews(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(GameReview::class);
    }
    public function gameStatus(): BelongsTo
    {
        return $this->belongsTo(GameStatus::class);
    }

    public static function createGame(array $aData): Game
    {
        return Game::create($aData);
    }

    public function updateGame(array $aData): bool
    {
        return $this->update($aData);
    }
}
