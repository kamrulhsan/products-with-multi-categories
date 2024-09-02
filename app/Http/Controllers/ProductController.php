<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Services\ProductService;
use Exception;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $result['products'] = $this->productService->getAll();
        return view('products.list', $result);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $data['categories'] = $this->productService->getAllCategory();
        return view('products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        try {
            $validated = $request->validated();
            $result =  $this->productService->saveProductData($request);

            return redirect('admin/products')->with('success', 'New Product Added');
        } catch (Exception $e) {

            return redirect('admin/products')->with('error', $e->getMessage());
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
            $data['productCategories'] = $this->productService->getAllCategory();
            $data['data'] = $this->productService->getById($id);
            // dd($data);
            return view('products.edit', $data);
        } catch (\Throwable $th) {
            return redirect('admin/products')->with('error', $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, string $id)
    {
        try {
            $validated = $request->validated();
            $result =  $this->productService->updateProduct($request, $id);

            return redirect('admin/products')->with('success', 'Product has been updated');
        } catch (Exception $e) {

            return redirect('admin/products')->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        try {
            $this->productService->deleteProduct($id);
            return redirect('admin/products')->with('success', 'Product has been Deleted');
        } catch (\Throwable $th) {
            return redirect('admin/products')->with('error', $th->getMessage());
        }
    }

    public function deleteImage($id)
    {
        try {
            $this->productService->deleteImage($id);
            return redirect()->back()->with('success', 'Image deleted successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

    }
    
}
