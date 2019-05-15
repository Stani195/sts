<?php


namespace st_php3\Model;


use Illuminate\Database\Eloquent\Model;

class countrie extends Model
{
 public function countries()
 {
     return $this->hasMany(Citie::class);
 }
}