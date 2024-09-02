<?php
namespace App\Repositories;

use App\Models\{
    Product,
    ProductPurchase
};

class ProductPurchaseRepository
{

    public function getallProductPurchases()
    {
        // dd(Product::with('categories')->get());
        return ProductPurchase::with('product')->get();
    }

    public function getallProducts()
    {
        return Product::all();
    }

    
    public function store($data)
    {
        $product = Product::find($data['product_id']);

        $product->stock_qty -= $data['quantity'];

        $product->save();

        $purchase = new ProductPurchase();

        $purchase->product_id   = $data['product_id'];
        $purchase->quantity     = $data['quantity'];
        $purchase->total_amount = $data['total_amount'];
        $purchase->save();

        return $purchase->fresh();

    }

    public function getById($id)
    {
        return ProductPurchase::where('id', $id)->first();
    }

    public function update($data, $id)
    {
        $purchase = ProductPurchase::findOrFail($id);
        $product = Product::findOrFail($purchase->product_id);

        $originalQuantity = $purchase->quantity;
        $newQuantity = $data['quantity'];
        $quantityDifference = $newQuantity - $originalQuantity;

        $product->stock_qty -= $quantityDifference;

        if ($product->stock_qty < 0) {
            return redirect()->back()->withErrors(['quantity' => 'The adjusted quantity exceeds the available stock.']);
        }
        $product->save();


        $purchase->product_id   = $data['product_id'];
        $purchase->quantity = $newQuantity;
        $purchase->total_amount = $data['total_amount'];
        $purchase->save();

        return $product;
    }

    public function delete($id)
    {
        $purchase = ProductPurchase::find($id);

        $purchase->delete();

        return $purchase;
    }
}

?>