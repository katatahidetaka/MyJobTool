<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use App\Http\Requests\searchWordRequest;
use App\Services\SearchService;

class SearchController extends Controller
{

    public function searchByTags(int $id, Category $category, SearchService $service): mixed
    {
        if ($service->boolTagIsNull($id)) {
            return back()->with('errormessage', 'タグが見つかりません');
        }
        $result = $service->getPostSearchedByTags($id);
        $posts = $result['posts'];
        $tagName = $result['tagName'];

        $categoryList[] = $category->getCategoryList();

        return view('search.tag', compact('posts', 'tagName', 'categoryList'));
    }

    public function searchByKeywords(searchWordRequest $request, Category $category, SearchService $service): View
    {
        $inputKeyword = $request->inputKeyword;
        $posts = $service->getPostSearchedByKeywords($inputKeyword);
        $categoryList[] = $category->getCategoryList();

        return view('search.keyword', compact('posts', 'inputKeyword', 'categoryList'));
    }
}
