<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all products that belong to the currently logged-in vendor
        $products = Product::where('vendor_id', Auth::id())->orderBy('id', 'DESC')->paginate(10);

        // Return view with product data
        return view('admin.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch categories
        $product = null ;
        $categories = ProductCategory::all();

        // Return view for creating a product along with categories data
        return view('admin.product.product',  compact('product'), ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'name' => 'required|unique:products|max:255',
            'description' => 'nullable',
            'price' => 'required|numeric',
        ]);

        // Create new product
//        $ext = $request->file('image')->getClientOriginalExtension(); // Get the extension of the uploaded file
//        $filename = $request->name . '.' . $ext; // Generate a unique filename
//
//        // Move the uploaded file to the product_image directory
//        $request->file('image')->move('product_image', $filename);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('product_images', $filename);
        } else {
            $filename = 'default.jpg';
        }



        // Create the product with all attributes including the image filename
        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'slug' => $request->slug,
            'image' => $filename,
            'vendor_id' => auth()->user()->id,
        ]);



        // Redirect with success message
        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // Check if the product belongs to the currently logged-in vendor
        if ($product->vendor_id != Auth::id()) {
            return redirect()->route('product.index')->with('error', 'You do not have permission to edit this product.');
        }

        $categories = ProductCategory::all();
        // Return view for editing a product
        return view('admin.product.product', [
            'product' => $product,
            'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // Check if the product belongs to the currently logged-in vendor
        if ($product->vendor_id != Auth::id()) {
            return redirect()->route('product.index')->with('error', 'You do not have permission to update this product.');
        }

        // Validate request data
        $request->validate([
            'name' => 'required|unique:products,name,' . $product->id . '|max:255',
            'description' => 'nullable',
            'price' => 'required|numeric',
        ]);

        // Update product
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        // Redirect with success message
        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Check if the product belongs to the currently logged-in vendor
        if ($product->vendor_id != Auth::id()) {
            return redirect()->route('product.index')->with('error', 'You do not have permission to delete this product.');
        }

        // Delete product
        $product->delete();

        // Redirect with success message
        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }

    public function product($id)
    {
        // Fetch products from the 'products' table in the 'drop_me' database
        $products = DB::connection('drop_me')
            ->table('products')
            ->where('vendor_id', '=',$id )
            ->get();


        // Return view with product data
        return view('pages.pizzahut', ['products' => $products]);

    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart',[]);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully.');
    }

    public function cart()
    {
        return view('pages.cart');
    }

    public function update_cart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully.');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }

    public function order()
    {
        // Fetch the cart from the session
        $cart = session()->get('cart', []);

        // Return the view with the cart data
        return view('pages.order_history', ['orders' => $cart]);
    }
}
