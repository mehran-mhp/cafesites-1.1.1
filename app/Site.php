<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Site extends Model{
    public function categories(){
        return $this->belongsToMany(Category::class);
    }
    public function photos(){
        return $this->belongsToMany(Photo::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
