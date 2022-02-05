<?php

namespace App\Models;

use App\Models\Item;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'description', 'image'];
    // protected $with = ['subCategory'];
    // protected $with = ['subCategory'];
    protected static function booted()
    {
        static::saving(function ($category) {
            $category->slug = Str::slug($category->name);
        });
    }

    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return asset('images/noImage.png');
        } else if (Str::startsWith($this->image, ['https://',  'http://'])) {
            return $this->image;
        }
        return \Storage::url($this->image);
    }
    public function subCategory()
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
