<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'body', 'visibility'];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function media() {
        return $this->hasMany(Media::class);
    }
//    public function comments() {
//        return $this->hasMany(Comment::class);
//    }
//    public function likes() {
//        return $this->morphMany(Like::class, 'likeable');
//    }
//    public function tags() {
//        return $this->belongsToMany(Tag::class);
//    }
}
