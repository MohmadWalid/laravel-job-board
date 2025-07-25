<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = ["body", "author"];
    protected $guarded = ['post_id'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
