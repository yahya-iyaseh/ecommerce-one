<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'category_id'];
    protected static function booted()
    {
        static::saving(function ($subCategory) {
            $subCategory->slug = Str::slug($subCategory->name);
        });
    }
    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
