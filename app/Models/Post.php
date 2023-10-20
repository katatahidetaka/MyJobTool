<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'title',
        'content'
    ];
    
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
      //使わなくても行けた
      //return $this->belongsTomeny(Tag::class, 'post_tag')->using(PostTag::class);
    }
    
    //1つの記事は一人のユーザーを持つ(user->post 1対多リレーションの逆)
    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}