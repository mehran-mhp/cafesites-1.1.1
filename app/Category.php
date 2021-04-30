<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Category extends Model{
    public function sites(){
        return $this->belongsToMany(Site::class);
    }
}
