<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'content',
    ];
    
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
      //使わなくても行けた
      //return $this->belongsTomeny(Tag::class, 'post_tag')->using(PostTag::class);
    }
}