<?php


namespace st_php3\Model;


use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
 public function user(){
     return $this -> belongsTo(User::class);
 }
 public function categorys()
 {
     return $this->belongsToMany(Category::class);
 }
}