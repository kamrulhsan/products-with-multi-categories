<?php 
namespace App\Services;

use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\DB;

class ProductService
{

    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAll()
    {
        return $this->productRepository->getallProducts();
    }

    public function getAllCategory()
    {
        return $this->productRepository->getallCategory();
    }

    public function saveProductData($data)
    {
        return $this->productRepository->store($data);
    }

    public function getById($id)
    {
        return $this->productRepository->getById($id);
    }

    public function updateProduct($data, $id)
    {
        return $this->productRepository->update($data, $id);
    }

    public Function deleteProduct($id)
    {
        DB::beginTransaction();

        try {
            $Product = $this->productRepository->delete($id);
        } catch (\Throwable $th) {
            
            DB::rollBack();
            throw $th;

        }
        DB::commit();

        return $Product;
    }

    public function deleteImage($id) 
    {
        return $this->productRepository->deleteImage($id);
    }
}

?>