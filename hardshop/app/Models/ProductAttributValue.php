<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttributValue extends Model
{
    protected $fillable=['value','product_attribut_id'];
    
    
    public function product(){
        return $this->belongsTo(Product::class);
    }
    
    public function attribut(){
        return $this->belongsTo(ProductAttribut::class,'product_attribut_id');
    }

}
