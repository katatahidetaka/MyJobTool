<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Tag;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Category $category)
    {
        $categoryList[] = $category->getCategoryList();
        return view('category.index', compact('categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCategoryRequest $request, string $id)
    {
        $message = '';
        $category = Category::findOrFail($id);
        if($category->name !== $request->categoryName){
            $category->name = $request->categoryName;
            $category->save();
            $message = "カテゴリを編集しました";
        }
        return redirect()->route('category.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd($id);
//         $deleteTagId = [];
//         $category = Category::findOrFail($id);
//         $category->delete();
//         //削除するカテゴリに所属するタグも削除する
//        $tags = Tag::where('category_id', $id)->get();
       
//        foreach ($tags as $tagId) {
//            $deleteTagId[] = $tagId ->id;
//        }
//        $tag->posts()->detach($deleteTagId);
       
//        $tag->delete();
        
//         return redirect()->route('category.index')->with('message', 'タグを削除しました');
    }
}
