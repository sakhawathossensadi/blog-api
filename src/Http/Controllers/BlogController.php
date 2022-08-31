<?php

namespace Blog\Blog\Http\Controllers;

use Blog\Blog\Http\Requests\BlogRequest;
use Blog\Blog\Http\Resources\BlogResource;
use Blog\Blog\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends BaseController
{
    public function store(BlogRequest $request)
    {
        $data = $request->except('_token');
        $data['published_at'] = now();

        $blog = Blog::create($data);

        return new BlogResource($blog);
    }
}
