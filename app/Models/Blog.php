<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'user_id', 'category_id', 'title', 'slug', 'content', 'featured_image', 'status', 'published_at'
    ];

    protected $dates = ['published_at'];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class); // Author
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Scopes
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    public function scopeLatestFirst($query)
    {
        return $query->orderBy('published_at', 'desc');
    }

    // Attach tags helper
    public function attachTags(array $tagIds)
    {
        $this->tags()->sync($tagIds);
    }
}
