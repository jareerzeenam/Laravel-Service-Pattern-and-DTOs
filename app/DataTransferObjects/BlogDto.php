<?php

namespace App\DataTransferObjects;

use App\Enums\BlogSource;
use App\Http\Requests\App\BlogRequest as AppBlogRequest;
use App\Http\Requests\Api\BlogRequest as ApiBlogRequest;

class BlogDto
{

    public function __construct(
        public readonly string $title,
        public readonly string $body,
        public readonly BlogSource $source
    )
    {
    }

    public static function fromAppRequest(AppBlogRequest $request): BlogDto
    {
        return  new self(
            title: $request->validated('title'),
            body: $request->validated('body'),
            source: BlogSource::App
        );
    }
    public static function fromApiRequest(ApiBlogRequest $request): BlogDto
    {
        return  new self(
            title: $request->validated('payload.post.title'),
            body: $request->validated('payload.post.body'),
            source: BlogSource::Api
        );
    }
}
