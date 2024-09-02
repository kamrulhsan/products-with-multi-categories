<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductPurchaseRequest;
use App\Services\ProductPurchaseService;
use Exception;

class ProductPurchaseController extends Controller
{
    protected $productPurchaseService;

    public function __construct(ProductPurchaseService $productPurchaseService)
    {
        $this->productPurchaseService = $productPurchaseService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $result['purchases'] = $this->productPurchaseService->getAll();
        return view('products.purchases.list', $result);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $data['products'] = $this->productPurchaseService->getallProducts();
        return view('products.purchases.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductPurchaseRequest $request)
    {
        try {
            $validated = $request->validated();
            $result =  $this->productPurchaseService->saveProducPurchasetData($request);

            return redirect('admin/product-purchases')->with('success', 'New Product Purchase data Added');
        } catch (Exception $e) {

            return redirect('admin/product-purchases')->with('error', $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $data['products'] = $this->productPurchaseService->getallProducts();
            $data['data'] = $this->productPurchaseService->getById($id);

            return view('products.purchases.edit', $data);
        } catch (\Throwable $th) {
            return redirect('admin/product-purchases')->with('error', $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductPurchaseRequest $request, string $id)
    {
        try {
            $validated = $request->validated();
            $result =  $this->productPurchaseService->updateProductPurchase($request, $id);

            return redirect('admin/product-purchases')->with('success', 'Product Purchase has been updated');
        } catch (Exception $e) {

            return redirect('admin/product-purchases')->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        try {
            $this->productPurchaseService->deleteProductPurchase($id);
            return redirect('admin/product-purchases')->with('success', 'Product Purchase has been Deleted');
        } catch (\Throwable $th) {
            return redirect('admin/product-purchases')->with('error', $th->getMessage());
        }
    }
    
}
