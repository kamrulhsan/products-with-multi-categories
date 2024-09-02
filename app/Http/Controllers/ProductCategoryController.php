<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCategoryRequest;
use App\Services\ProductCategoryService;
use Exception;

class ProductCategoryController extends Controller
{
    protected $categoryService;

    public function __construct(ProductCategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result['categories'] = $this->categoryService->getAll();
        return view('products.category.list', $result);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCategoryRequest $request)
    {
        try {
            $validated = $request->validated();
            $result =  $this->categoryService->saveCategoryData($request);

            return redirect('admin/product-categories')->with('success', 'New Categories Added');
        } catch (Exception $e) {

            return redirect('admin/product-categories')->with('error', $e->getMessage());
        }
    }

    public function update(ProductCategoryRequest $request, string $id)
    {
        try {
            $validated = $request->validated();
            $result =  $this->categoryService->updateCategory($request, $id);

            return redirect('admin/product-categories')->with('success', 'Categories has been updated');
        } catch (Exception $e) {

            return redirect('admin/product-categories')->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->categoryService->deleteCategory($id);
            return redirect('admin/product-categories')->with('success', 'Categories has been Deleted');
        } catch (\Throwable $th) {
            return redirect('admin/product-categories')->with('error', $th->getMessage());
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
            $result['data'] = $this->categoryService->getById($id);
            return view('products.category.edit', $result);
        } catch (\Throwable $th) {
            return redirect('admin/product-categories')->with('error', $th->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    
}
