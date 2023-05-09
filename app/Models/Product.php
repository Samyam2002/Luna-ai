<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category(){
        return $this->belongsTo(Category::class);
    }

    // public function scopeRelatedProducts($query, $count = 10, $inRandomOrder = true){
    //     $query = $query->where('category_id', $this->category_id);

    //     if ($inRandomOrder) {
    //         $query->inRandomOrder();
    //     }

    //     return $query->take($count);
    // }
}
