<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tag extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'category_id',
    ];
    
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }
    
    public function catgory(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
