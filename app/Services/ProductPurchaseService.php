<?php 
namespace App\Services;

use App\Repositories\ProductPurchaseRepository;
use Illuminate\Support\Facades\DB;

class ProductPurchaseService
{

    protected $productPurchaseRepository;

    public function __construct(ProductPurchaseRepository $productPurchaseRepository)
    {
        $this->productPurchaseRepository = $productPurchaseRepository;
    }

    public function getAll()
    {
        return $this->productPurchaseRepository->getallProductPurchases();
    }

    public function getallProducts()
    {
        return $this->productPurchaseRepository->getallProducts();
    }

    public function saveProducPurchasetData($data)
    {
        return $this->productPurchaseRepository->store($data);
    }

    public function getById($id)
    {
        return $this->productPurchaseRepository->getById($id);
    }

    public function updateProductPurchase($data, $id)
    {
        return $this->productPurchaseRepository->update($data, $id);
    }

    public Function deleteProductPurchase($id)
    {
        DB::beginTransaction();

        try {
            $Product = $this->productPurchaseRepository->delete($id);
        } catch (\Throwable $th) {
            
            DB::rollBack();
            throw $th;

        }
        DB::commit();

        return $Product;
    }
}

?>