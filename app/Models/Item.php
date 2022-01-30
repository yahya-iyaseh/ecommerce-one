<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'image', 'description', 'additional_info', 'category_id', 'sub_category'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getIMageUrlAttribute(){
        if(!$this->image){
            return asset('images/noImage.png');
        }

        return \Storage::url($this->image);


    }
}
