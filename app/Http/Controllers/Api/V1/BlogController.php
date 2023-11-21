<?php

namespace App\Http\Controllers\Api\V1;

use App\DataTransferObjects\BlogDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\BlogRequest;
use App\Http\Resources\Api\BlogResource;
use App\Models\Blog;
use App\Services\BlogService;

class BlogController extends Controller
{
    public function __construct(
        protected BlogService $service
    )
    {}
    public function store(BlogRequest $request): BlogResource
    {
        $blog = $this->service->store(
            BlogDto::fromApiRequest($request),
        );

        return BlogResource::make($blog);
    }

    public function update(BlogRequest $request, Blog $blog): BlogResource
    {
        $blog = $this->service->update(
            $blog,
            BlogDto::fromApiRequest($request),
        );

        return BlogResource::make($blog);
    }
}
