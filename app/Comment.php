<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Comment extends Model{
    public function site(){
        return $this->belongsTo(Site::class, 'site_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
