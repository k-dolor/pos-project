<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;

class ProductController extends Controller
{
    public function list()
    {
        $products = Product::all();
        $products = Product::orderBy('product_id', 'asc')->paginate(10);
        
        return view('product.list', compact('products'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        
        $products = Product::query()
            ->when($query, function($q) use ($query) {
                return $q->where('product_name', 'LIKE', "%{$query}%")
                         ->orWhere('artist', 'LIKE', "%{$query}%");
            })
            ->paginate(25);

        return view('product.list', compact('products'));
    }

    public function show($id){

        $products = Product::find($id); 
        return view('product.show', compact('products'));
    }

    public function create()
    {
         // call meodels
         $supplierModel = new Supplier();

         // Fetch all Prodcuts values from the prdct table in the database
         $suppliers = $supplierModel->get();
        
         // Return to the add rroduct module with supplier values     }
        return view('product.create' , ['suppliers' => $suppliers]);
    }

    public function store(Request $request)
    {
        // Check if the request method is POST
        if ($request->isMethod('post')) {
            
            // Validate the request data
            $validated = $request->validate([
                'product_name' => ['required'],
                'artist' => ['nullable'],
                'genre' => ['required'],
                'release_date' => ['required', 'date'],
                'price' => ['required'],
                'stock' => ['required'],
                'supplier_id' => ['required'],
            ]);

            if ($request->hasFile('product_image')) {
                $fileNameWithExtension = $request->file('product_image')->getClientOriginalName();
                $filename = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
                $extension = $request->file('product_image')->getClientOriginalExtension();
                $filenameToStore = $filename . '_' . time() . '.' . $extension;
                $request->file('product_image')->storeAs('public/product', $filenameToStore);
                $validated['product_image'] = $filenameToStore; // Only store the file name
            } else {
                $validated['product_image'] = null; // Handle default in the view
            }
            
            // Create a new prodcts record
            $productModel = new Product();
            $productModel->create($validated);

            // Redirect with success message
            return redirect('/products')->with('message_success', 'Product Successfully Added!');

        }
    }

           //EDIT------------//
    public function edit($id)
    {
        $product = Product::findOrFail($id); 

        $suppliers = Supplier::all();

        return view('product.edit', compact('product', 'suppliers'));
    
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'product_image' => 'nullable|mimes:jpeg,png,bmp,gif|max:4096',
            'product_name' => 'required',
            'artist' => 'required',
            'genre' => 'required',
            'release_date' => 'required|date',
            'price' => 'required',
            'stock' => 'required',
            'supplier_id' => 'required',
        ]);

        if ($request->hasFile('product_image')) {
            $fileNameWithExtension = $request->file('product_image')->getClientOriginalName();
            $filename = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('product_image')->getClientOriginalExtension();
            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            $request->file('product_image')->storeAs('public/product', $filenameToStore);
            $validated['product_image'] = $filenameToStore;
        }

        $product->update($validated);

        return redirect('/products')->with('message_success', 'Product Successfully Updated.');
    }

    public function delete($id){
        $product = Product::find($id);
        return view ('product.delete', compact('product'));
    }

    public function destroy(Request $request, Product $product){
        $product->delete($request);

        return redirect('/products')-> with ('message_success', 'Product Successfully deleted.');

    }
}

