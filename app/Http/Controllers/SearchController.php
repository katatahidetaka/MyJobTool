<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use App\Models\Post;
use App\Http\Requests\searchWordRequest;

class SearchController extends Controller
{
    public function searchByTags(int $id, Category $category) :View
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
    
    public function searchByKeywords(searchWordRequest $request, Category $category) :View
    {
        $inputKeyword = $request->inputKeyword;
        $keywords = [];
        $keywords = self::procKeywords($inputKeyword);
        foreach ($keywords as $keyword) {
            $keyword = addcslashes($keyword, '%_\\');
            $posts = Post::where('title', 'like', '%'. $keyword. '%')
            ->orwhere('content', 'like', '%'. $keyword. '%')
            ->orderBy('created_at', 'DESC')
            ->paginate(5);
        }
        $categoryList[] = $category->getCategoryList();
        
        return view('search.keyword',compact('posts', 'inputKeyword', 'categoryList'));
    }
    
    private function procKeywords(?string $input) :array
    {
        $keywords = str_replace('　', ' ', $input);
        $keywords = preg_replace('/\s++/', ' ', $keywords);
        return preg_split('/ ++/', $keywords);
    }
}
