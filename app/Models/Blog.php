<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'category_id',
        'author_id',
        'title',
        'description',
        'status'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function author() {
        return $this->belongsTo(User::class);
    }
}
