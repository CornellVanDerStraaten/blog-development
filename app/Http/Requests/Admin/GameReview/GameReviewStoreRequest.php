<?php

namespace App\Http\Requests\Admin\GameReview;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class GameReviewStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => Str::slug($this->title),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'slug' => 'required|unique:game_reviews',
            'game_id' => 'required',
            'subtitle' => 'sometimes',
            'excerpt' => 'required|min:20',
            'content' => 'required',
        ];
    }
}
