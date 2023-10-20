<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class PostPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        //時に何もなし
        return TRUE;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user): bool
    {
        //特に何もなし
        return TRUE;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(?User $user): Response
    {
        //ログインしているかどうかを判別
        return Auth::check() ? Response::allow() : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): bool
    {
        //編集する記事の投稿者IDとログインしているIDを比較
        return $user->id === $post->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
        //ユーザーのIDと記事投稿者のIDを比較
        return $user->id === $post->user_id;
    }
}
