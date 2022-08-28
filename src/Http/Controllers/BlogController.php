<?php

namespace Blog\Blog\Http\Contollers;

use Blog\Blog\Http\Requests\BlogRequest;
use Illuminate\Http\Request;

class BlogController extends BaseController
{
    public function store(BlogRequest $request)
    {
        dd($request);
    }
}
