<?php


namespace st_php3\Model;


use Illuminate\Database\Eloquent\Model;

class Citie extends Model
{
        public function countrie()
        {
            return $this->belongsTo(countrie::class);
        }
}