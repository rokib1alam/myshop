<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class categorie extends Model
{
    use HasFactory;
    protected $fillable = ['category_name', 'category_slug'];

    public static function newCategories($request)
    {
        $category = new self();
        self::saveBasicInfo($category, $request);
    }

    public static function updateCategories($request, $category)
    {
        self::saveBasicInfo($category, $request);
    }

    private static function saveBasicInfo($category, $request)
    {
        $category->category_name  = $request->category_name;
        $category->category_slug  = Str::slug($request->category_name, '-');
        $category->save();
    }

    public static function deleteCategory($category)
    {
        $category->delete();
    }
}
