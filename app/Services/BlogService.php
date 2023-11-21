<?php

namespace App\Services;

use App\DataTransferObjects\BlogDto;
use App\Models\Blog;

class BlogService
{
    public function store(BlogDto $dto)
    {
        return Blog::create([
            'title' => $dto->title,
            'body' => $dto->body,
            'source' => $dto->source,
        ]);
    }
    public function update(Blog $blog, BlogDto $dto)
    {
        return tap($blog)->update([
            'title' => $dto->title,
            'body' => $dto->body,
            'source' => $dto->source,
        ]);
    }
}
