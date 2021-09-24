<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function article() {
         // (hasOne)uno a uno (hasMany)molti a uno dove NON abbiamo la foreign key
        return $this->hasMany(Article::class); // colleghiamo con article
    } 
}
