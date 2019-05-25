<?php


namespace st_php3\Model;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function articles()
    {
        return $this -> hasMany(Article::class);
    }
}