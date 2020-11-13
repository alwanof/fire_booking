<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryImage extends Model
{
    public function Category()
    {
      return $this->belongsTo(Category::class);
    }
}
