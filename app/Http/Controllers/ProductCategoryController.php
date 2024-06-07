<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use Illuminate\Support\Facades\DB;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product_category.index', [
            'product_categories' => ProductCategory::orderBy('id', 'DESC')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product_category.form', [
            'product' => (new productCategory()),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductCategoryRequest $request)
    {
        (new ProductCategory())->create($request->all());

        return redirect()->route('product-category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategory $productCategory)
    {
        return view('admin.product_category.form', [
            'product' => $productCategory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory)
    {
        $productCategory->update($request->all());

        return redirect()->route('product-category.index')->with('success', 'Product category successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();

        return redirect()->route('product-category.index')->with('success', 'Product category successfully deleted.');
    }

    public function product()
    {
//        $data=drop_me::all();
//
//        return view('pages.pizzahut');
        $data = DB::connection('drop_me')->table('products')->get();
        return view('pages.pizzahut', ['data' => $data]);
    }

}
