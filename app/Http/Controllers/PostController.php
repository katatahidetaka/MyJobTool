<?php
namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\Category;
use App\Services\PostService;

class PostController extends Controller
{

    public function __construct()
    {
        // Authミドルウェアによる認証処理の記述
        // indexメソッドとshowメソッド以外にAuthミドルウェアを適用する
        $this->middleware('auth')->except([
            'index',
            'show'
        ]);
        // PostPolicyによる認可処理のための記述
        $this->authorizeResource(Post::class, 'post');
    }

    public function index(Category $category, PostService $service)
    {
        $posts = $service->getPosts();
        $categoryList[] = $category->getCategoryList();
        return view('post.index', compact('posts', 'categoryList'));
    }

    public function create(Category $category)
    {
        $tagList = $category->getTagList();
        return view('post.create', compact('tagList'));
    }

    public function store(StorePostRequest $request, PostService $service)
    {
        $service->storePost($request);
        $request->session()->flash('message', '成功しました');
        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post, Category $category)
    {
        // 記事に設定されているタグのIDを配列$tagArrayに格納してviewに送る
        $tagArray = [];
        foreach ($post->tags as $tag) {
            array_push($tagArray, $tag->id);
        }
        $tagList = $category->getTagList();
        return view('post.edit', compact('post', 'tagList', 'tagArray'));
    }

    public function update(StorePostRequest $request, Post $post, PostService $service)
    {
        $service->updatePost($request, $post);
        $request->session()->flash('message', '編集しました');
        return redirect()->route('post.show', compact('post'));
    }

    public function destroy(Post $post, PostService $service)
    {
        $service->deletePost($post);
        return redirect()->route('post.index')->with('message', '削除に成功しました');
    }
}
