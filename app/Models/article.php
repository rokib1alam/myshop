<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver; // Import Intervention Image Facade

class article extends Model
{
    use HasFactory;
    private static $image, $imageName, $directory, $imageUrl;

    protected $fillable = ['title','category_id', 'excerpt', 'content', 'image'];

    private static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = "upload/article-images/";
        self::$image->move(self::$directory, self::$imageName);
        // Resize the image using Intervention Image
        //create new manager instance with desred driver
        $imageManager = new ImageManager(new Driver());
        //Reading Upload imageFrom Local File system (uploads)
        $imageUrl = $imageManager->read(self::$directory .self::$imageName);
        //Resize the image
        $imageUrl->resize(240, 240); // Resize to 2, adjust as needed
        $imageUrl->save(self::$directory. self::$imageName);
        self::$imageUrl = self::$directory . self::$imageName;
        return self::$imageUrl;
    }

    public static function newArticles($request)
    {
        self::$imageUrl = $request->file('image') ? self::getImageUrl($request) : '';

        $article = new article();
        self::saveBasicInfo($article, $request, self::$imageUrl);
    }

    public static function updateArticles($request, $article)
    {
        if ($request->file('image')) {
            if (file_exists($article->image)) {
                unlink($article->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        } else {
            self::$imageUrl = $article->image;
        }
        self::saveBasicInfo($article, $request, self::$imageUrl);
    }

    private static function saveBasicInfo($article, $request, $imageUrl)
    {
        // Fetch category name from the request
        $categoryName = Categorie::findOrFail($request->category_id)->name;
        // Set article attributes
        $article->category_id = $request->category_id;
        $article->category_name = $categoryName; // Assuming you have a `category_name` attribute in your `articles` table or model
        $article->title = $request->title;
        $article->excerpt = $request->excerpt;
        $article->content = $request->content;
        $article->image = $imageUrl;
        $article->save();
    }

    public static function deleteArticles($article)
    {
        if (file_exists($article->image)) {
            unlink($article->image);
        }
        $article->delete();
    }
    public function category(){
        return $this->belongsTo(categorie::class);
    }
}
