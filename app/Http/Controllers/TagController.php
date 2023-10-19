<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Category;
use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Category $category)
    {
        //TagPolicyによる認可
        $this->authorize('viewAny', Tag::class);
        
        $categoriesArray = $category->getCategoriesArray();
        $categoryList[] = $category->getCategoryList();
        return view('tag.index', compact('categoryList', 'categoriesArray'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagRequest $request)
    {
        //TagPolicyによる認可
        $this->authorize('create', Tag::class);
        
        $tag = new Tag();
        $tag->name = $request->tagName;
        $tag->category_id = $request->categoryId;
        $tag->save();
        
        return redirect()->route('tag.index')->with('message', '新規タグを作成しました');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTagRequest $request)
    {
        //TagPolicyによる認可
        $this->authorize('update', Tag::class);
        
        $tag = Tag::findOrFail($request->tagId);
        $tag->category_id = $request->categoryId;
        $tag->name = $request->tagName;
        $tag->save();
        return redirect()->route('tag.index')->with('message', 'タグを編集しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //TagPolicyによる認可
        $this->authorize('delete', Tag::class);
        
        try {
            DB::beginTransaction();
            
            $tag = Tag::with('posts')->where('id',$id)->firstOrFail();
            $tag->posts()->detach();
            $tag->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            return redirect()->route('tag.index')->with('message', '処理に失敗しました');
        }
        
        return redirect()->route('tag.index')->with('message', 'タグを削除しました');
    }
}
