<?php

namespace App\Models;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['label'];

    public function subCategories(){
        return $this->hasMany(SubCategory::class);
    }
    
}
