<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\View\View;
//import return type redirectResponse
use Illuminate\Http\RedirectResponse;



class ProductController extends Controller
{
    /**
     * index
     * 
     * @return void
     */
    public function index() : View
    {
        //get all products
        // $products = Product::select("products.*", "category_product.product_category_name as product_category_name")
        //                      ->join('category_product', 'category_product.id', '=', 'products.product_category_id')
        //                      ->latest()
        //                      ->paginate(10);

        $product = new Product;
        $products = $product->get_product();
                            

        //render view with products
        return view('products.index', compact('products'));
   }

    /**
     * create
    *
    * @return view
    */
    public function create(): View
    {
        $product = new Product;
        $supplier = new Supplier;
 
        $data['categories'] = $product->get_category_product()->get();
        $data['suppliers_'] = $supplier->get_supplier()->get();

        return view('products.create', compact('data'));
    }

    public function store(Request $request): RedirectResponse
    {
    //validate form
    $validatedData = $request->validate([
        'image'                  => 'required|image|mimes:jpeg,jpg,png|max:2048',
        'title'                  => 'required|min:5',
        'product_category_id'    => 'required|integer',
        'id_supplier'            => 'required|integer',
        'description'            => 'required|min:10',
        'price'                  => 'required|numeric',
        'stock'                  => 'required|numeric'
    ]);

    // Menghandle upload file gambar
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $image->store('public/images'); // Simpan gambar ke folder penyimpanan
 
 
        // create product
        Product::create([
            'image'                 => $image->hashName(),
            'title'                 => $request->title,
            'product_category_id'   => $request->product_category_id,
            'id_supplier'           => $request->id_supplier,
            'description'           => $request->description,
            'price'                 => $request->price,
            'stock'                 => $request->stock
        ]);
 
       //redirect to index
       return redirect()->route('products.index')->with(['success' => 'Data Berhasil Disimpan!']);
     }
 
     //redirect to index
     return redirect()->route('products.index')->with(['error' => 'Failed to upload image.']);
 
    }

}