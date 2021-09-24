<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function author() { // colleghiamo con author
         // belongsTo dove abbiamo inserito la foreign key
        return $this->belongsTo(Author::class);
    } 
}
