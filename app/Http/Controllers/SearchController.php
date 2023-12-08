<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use App\Http\Requests\searchWordRequest;
use App\Services\SearchService;

class SearchController extends Controller
{
    public function searchByTags(int $id, Category $category) :mixed
    {
        $posts = [];
        $tagName = "";
        
        $tag = Tag::find($id);
        if (is_null($tag)) {
            return back()->with('errormessage', 'タグが見つかりません');
        }
        $posts = $tag->posts()->orderBy('created_at', 'DESC')->paginate(5);
        $tagName = $tag->name;
        $categoryList[] = $category->getCategoryList();
        
        return view('search.tag',compact('posts', 'tagName', 'categoryList'));
    }
    
    public function searchByKeywords(searchWordRequest $request, Category $category, SearchService $service) :View
    {
        $inputKeyword = $request->inputKeyword;
        $service->getPostSearchedByKeywords($inputKeyword);
        $categoryList[] = $category->getCategoryList();
        
        return view('search.keyword',compact('posts', 'inputKeyword', 'categoryList'));
    }
}
