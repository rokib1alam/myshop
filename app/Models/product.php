<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id', 'product_slug', 'subcategory_id', 'childcategory_id', 'brand_id',
        'pickup_point_id', 'product_name', 'product_code', 'unit', 'tags', 'color', 'size', 'video', 'purchase_price',
        'selling_price', 'discount_price', 'stock_quantity', 'warehouse',
        'description', 'thumbnail', 'images', 'featured', 'today_deal', 'status', 'admin_id', 'date', 'month'
    ];

    private static $directory, $imageUrl, $imagesUrl;

    private static function getImageUrl($imageFile, $directory, $resizeWidth = null, $resizeHeight = null)
    {
        $imageName = hexdec(uniqid()) . '.' . $imageFile->getClientOriginalExtension();
        $imageFile->move($directory, $imageName);

        if ($resizeWidth && $resizeHeight) {
            $imageManager = new ImageManager(new Driver());
            $image = $imageManager->read($directory . $imageName);
            $image->resize($resizeWidth, $resizeHeight);
            $image->save($directory . $imageName);
        }

        return $directory . $imageName;
    }

    public static function newProduct($request)
    {
        self::$directory = "upload/product/";
        
        if ($request->hasFile('thumbnail')) {
            self::$imageUrl = self::getImageUrl($request->file('thumbnail'), self::$directory, 600, 600);
        } else {
            self::$imageUrl = null;
        }

        self::$imagesUrl = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                self::$imagesUrl[] = self::getImageUrl($image, self::$directory, 600, 600);
            }
        }
        self::$imagesUrl = json_encode(self::$imagesUrl);

        $product = new Product();
        self::saveBasicInfo($product, $request, self::$imageUrl, self::$imagesUrl);
    }

    public static function updateProduct($request, $product)
    {
        self::$directory = "upload/product/";

        if ($request->hasFile('thumbnail')) {
            if (file_exists($product->thumbnail)) {
                unlink($product->thumbnail);
            }
            self::$imageUrl = self::getImageUrl($request->file('thumbnail'), self::$directory, 600, 600);
        } else {
            self::$imageUrl = $product->thumbnail;
        }

        if ($request->hasFile('images')) {
            if ($product->images) {
                $existingImages = json_decode($product->images);
                foreach ($existingImages as $existingImage) {
                    if (file_exists($existingImage)) {
                        unlink($existingImage);
                    }
                }
            }
            self::$imagesUrl = [];
            foreach ($request->file('images') as $image) {
                self::$imagesUrl[] = self::getImageUrl($image, self::$directory, 600, 600);
            }
            self::$imagesUrl = json_encode(self::$imagesUrl);
        } else {
            self::$imagesUrl = $product->images;
        }

        self::saveBasicInfo($product, $request, self::$imageUrl, self::$imagesUrl);
    }

    private static function saveBasicInfo($product, $request, $imageUrl, $imagesUrl)
    {
        $product->category_id = Subcategorie::find($request->subcategory_id)->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->childcategory_id = $request->childcategory_id;
        $product->brand_id = $request->brand_id;
        $product->pickup_point_id = $request->pickup_point_id;
        $product->product_name = $request->product_name;
        $product->product_slug = Str::slug($request->product_name, '-');
        $product->product_code = $request->product_code;
        $product->unit = $request->unit;
        $product->tags = $request->tags;
        $product->color = $request->color;
        $product->size = $request->size;
        $product->video = $request->video;
        $product->purchase_price = $request->purchase_price;
        $product->selling_price = $request->selling_price;
        $product->discount_price = $request->discount_price;
        $product->stock_quantity = $request->stock_quantity;
        $product->warehouse = $request->warehouse;
        $product->description = $request->description;
        $product->thumbnail = $imageUrl;
        $product->images = $imagesUrl;
        $product->featured = $request->featured;
        $product->today_deal = $request->today_deal;
        $product->status = $request->status;
        $product->product_slider = $request->product_slider;
        $product->admin_id = Auth::id();
        $product->date = date('d-m-y');
        $product->month = date('F');
        $product->save();
    }
    public static function deleteProduct($product)
    {
        if (file_exists($product->thumbnail )) {
            unlink($product->thumbnail);
        }
        if (file_exists($product->images )) {
            unlink($product->images);
        }
        $product->delete();
    }

    public function category()
    {
        return $this->belongsTo(Categorie::class, 'category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategorie::class, 'subcategory_id');
    }

    public function childcategory()
    {
        return $this->belongsTo(Childcategorie::class, 'childcategory_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function pickuppoint()
    {
        return $this->belongsTo(Pickup::class, 'pickup_point_id');
    }
}
