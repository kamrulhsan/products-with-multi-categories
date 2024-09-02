<?php
namespace App\Repositories;

use App\Models\Category;

class ProductCategoryRepository
{

    public function getallCategory()
    {
        return Category::all();
    }
    
    public function store($data)
    {
        $category = new Category();

        $category->category_name = $data['category_name'];

        $category->save();

        return $category->fresh();

    }

    public function getById($id)
    {
        return Category::where('id', $id)->first();
    }

    public function update($data, $id)
    {
        $category = Category::find($id);

        $category->category_name = $data['category_name'];

        $category->update();

        return $category;
    }

    public function delete($id)
    {
        $category = Category::find($id);

        $category->delete();

        return $category;
    }
}

?>