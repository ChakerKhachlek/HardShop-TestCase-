<?php

namespace App\Models;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $fillable=['label','description','quantity','price','image','isCustumizble'];

    public function subCategory(){
        return $this->belongsTo(SubCategory::class);
    }

    public function attributsValues(){
        return $this->hasMany(ProductAttributValue::class);
    }

}
