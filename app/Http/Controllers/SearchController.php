<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class SearchController extends Controller
{
    public function searchByTags(int $id)
    {
        $tag = Tag::find($id);
        $posts = $tag->posts;
        $tagName = $tag->name;
        
        return view('search.tag',compact('posts', 'tagName'));
    }
}
