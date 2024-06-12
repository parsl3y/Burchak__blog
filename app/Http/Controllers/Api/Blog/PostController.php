<?php

namespace App\Http\Controllers\Api\Blog;

use App\Http\Controllers\Blog\BaseController;
use App\Models\BlogPost;


class PostController extends BaseController
{
    public function index()
    {
        $posts = BlogPost::with(['user', 'category'])->get();

        return $posts;
    }
    public function show(string $id)
    {
        $item = BlogPost::with(['user', 'category'])->get()->find($id);
        if (empty($item)) {
            abort(404);
        }
        return $item;
    }
}
