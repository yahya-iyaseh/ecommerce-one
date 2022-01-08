<?php

namespace App\Models;

use App\Models\Item;
use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'description' , 'image'];
    // protected $with = ['subCategory'];
    public function subCategory(){
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }
    public function items(){
        return $this->hasMany(Item::class);
    }


}
