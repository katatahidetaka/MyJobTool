<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->categoryName;
        $category->save();
        
        return redirect()->route('category.index')->with('message', '新規カテゴリを作成しました');
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
        //削除するカテゴリに所属するタグも削除する
        $tags = Tag::where('category_id', $id)->get();
        foreach($tags as $tagId) {
            try {
                DB::beginTransaction();
                
                $tag = Tag::with('posts')->where('id',$tagId->id)->firstOrFail();
                $tag->posts()->detach();
                $tag->delete();

                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error($e);
                return redirect()->route('tag.index')->with('message', '処理に失敗しました');
            }
        }
        
        $category = Category::findOrFail($id);
        $category->delete();
        
        return redirect()->route('category.index')->with('message', 'タグを削除しました');
    }
}
