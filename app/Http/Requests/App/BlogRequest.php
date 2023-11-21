<?php

namespace App\Http\Requests\App;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required','max:80'],
            'body' => ['required','max:80'],
        ];
    }
}
