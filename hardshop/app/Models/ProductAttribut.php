<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribut extends Model
{
    protected $fillable=['name'];
    
    public function subCategory(){
        return $this->belongsTo(SubCategory::class);
    }

    public function attributValues(){
        return $this->hasMany(ProductAttributValue::class,'product_attribut_id');
    }
    
}
