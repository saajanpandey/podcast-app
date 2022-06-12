<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PodcastRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'max:255'],
            'artist_id' => ['required'],
            'category_id' => ['required'],
            'image' => ['required', 'mimes:png,jpg'],
            'audio' => ['required', 'mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav'],
            'status' => ['required', 'boolean'],
        ];
    }
}
