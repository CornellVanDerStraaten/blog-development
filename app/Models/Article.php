<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function createArticle(array $aData, $mainImage): Article
    {
        if (isset($aData['main_image']) && $mainImage) {
            $aData['main_image'] = $mainImage->store('articles/images');
        }

        return Article::create($aData);
    }

    public function updateArticle(array $aData, $mainImage): bool
    {
        if (isset($aData['main_image']) && $mainImage) {
            $aData['main_image'] = $mainImage->store('articles/images');
        }

        return $this->update($aData);
    }
}
