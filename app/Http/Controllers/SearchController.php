<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Category;

class SearchController extends Controller
{
    public function searchByTags(int $id, Category $category)
    {
        $tag = Tag::find($id);
        $posts = $tag->posts()->orderBy('created_at', 'DESC')->get();
        $tagName = $tag->name;
        $categoryList[] = $category->getCategoryList();
        
        return view('search.tag',compact('posts', 'tagName', 'categoryList'));
    }
}
