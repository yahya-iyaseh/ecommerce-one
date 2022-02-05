<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'image', 'description', 'additional_info', 'category_id', 'sub_category'];
    protected $with = ['category'];
    protected static function booted()
    {
        static::saving(function ($item) {
            $item->slug = Str::slug($item->name);
        });
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function getIMageUrlAttribute()
    {
        if (!$this->image) {
            return asset('images/noImage.png');
        }else if(Str::startsWith($this->image, ['https://', 'http://'])){
            return $this->image;
        }
        return \Storage::url($this->image);
    }
}
