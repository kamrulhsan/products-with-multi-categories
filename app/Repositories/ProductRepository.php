<?php
namespace App\Repositories;

use App\Models\{
    Product,
    Category,
    ProductImage
};
use App\Helpers\ImageHelper;
use Illuminate\Support\Facades\{
    File,
    Auth
};

class ProductRepository
{

    public function getallProducts()
    {
        return Product::with('categories')->where('is_active', 'yes')->get();
    }

    public function getallCategory()
    {
        return Category::all();
    }

    
    public function store($data)
    {

        $thumbnailName = ImageHelper::uploadImages($data['thumbnail'], 'uploads/products/thumbnails')[0];
        $product = new Product();

        $product->title = $data['title'];
        $product->slug = $data['slug'];
        $product->thumbnail = $thumbnailName;
        $product->sku = $data['sku'];
        $product->stock_qty = $data['stock_qty'];
        $product->short_description = $data['short_description'];
        $product->is_active = $data['is_active'];
        $product->long_description = $data['long_description'];
        $product->created_by_id = Auth::user()->id;

        $product->save();

        
        foreach ($data['product_categories'] as $key => $value) {

            $product->categories()->attach($value);
        }

        $uploadedFiles = ImageHelper::uploadImages($data['images'], 'uploads/products/product-image/' . $product->id);

        foreach ($uploadedFiles as $uploadedFile) {
            ProductImage::create([
                'product_id' => $product->id,
                'image_name' => $uploadedFile,
            ]);
        }
        return $product->fresh();

    }

    public function getById($id)
    {
        $product = Product::with('categories','images')->where('id', $id)->where('is_active', 'yes')->first();

        if (!$product) {
            throw new \Exception('Product not found or is not active.');
        }

        return $product;
    }

    public function update($data, $id)
    {
        $product = Product::findOrFail($id);

        // dd($data['images']);
        if ($data['thumbnail']) {
            if ($product->thumbnail) {
                $oldThumbnailPath = public_path('uploads/products/thumbnail/' . $product->thumbnail);
                if (File::exists($oldThumbnailPath)) {
                    File::delete($oldThumbnailPath);
                }
            }
            $thumbnailName = ImageHelper::uploadImages($data['thumbnail'], 'uploads/products/thumbnails')[0];

            $product->thumbnail = $thumbnailName;
        }
        

        $product->title = $data['title'];
        $product->slug = $data['slug'];
        $product->sku = $data['sku'];
        $product->stock_qty = $data['stock_qty'];
        $product->short_description = $data['short_description'];
        $product->is_active = $data['is_active'];
        $product->long_description = $data['long_description'];
        $product->updated_by_id = Auth::user()->id;

        $product->categories()->sync($data['product_categories']);

        $product->update();

        if ($data['images']) {

            $uploadedFiles = ImageHelper::uploadImages($data['images'], 'uploads/products/product-image/' . $product->id);

            foreach ($uploadedFiles as $uploadedFile) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_name' => $uploadedFile,
                ]);
            }
        }

        return $product;
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return $product;
    }

    public function deleteImage($id)
    {
        $image = ProductImage::findOrFail($id);
        if ($image) {
            $imagePath = public_path('uploads/products/product-image/' . $image->product_id . '/' . $image->image_name);
            
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $image->delete();
        }

        return $image;
    }
}

?>