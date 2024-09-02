<?php 
namespace App\Services;

use App\Repositories\ProductCategoryRepository;
use Illuminate\Support\Facades\DB;

class ProductCategoryService
{

    protected $categoryRepository;

    public function __construct(ProductCategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAll()
    {
        return $this->categoryRepository->getallCategory();
    }

    public function saveCategoryData($data)
    {
        return $this->categoryRepository->store($data);
    }

    public function getById($id)
    {
        return $this->categoryRepository->getById($id);
    }

    public function updateCategory($data, $id)
    {
        return $this->categoryRepository->update($data, $id);
    }

    public Function deleteCategory($id)
    {
        DB::beginTransaction();

        try {
            $category = $this->categoryRepository->delete($id);
        } catch (\Throwable $th) {
            
            DB::rollBack();
            throw $th;

        }
        DB::commit();

        return $category;
    }
}

?>