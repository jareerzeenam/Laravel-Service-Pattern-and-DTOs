<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'payload.post.title' => ['required','max:80'],
            'payload.post.body' => ['required','max:80'],
        ];
    }
}
