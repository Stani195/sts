<?php


namespace st_php3\Model;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
public function articles(){
    return $this->belongsToMany(Article::class);
}
}