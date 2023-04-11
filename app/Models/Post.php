<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'category_id',
        'user_id',
    ];


    protected static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->title);
            $model->user_id = auth()->id();
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
