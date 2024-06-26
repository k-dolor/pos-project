<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Product;
use Illuminate\Http\Request;

class SupplierController extends Controller
{

    public function list()
    {
        $suppliers = Supplier::all();
        
        return view('supplier.list', compact('suppliers'));
    }

    public function show($id){
        $supplier = Supplier::find($id); //Select * FROM suppliers WHERE supplier_id = id;

        return view('supplier.show', compact('supplier'));
    }

    

    public function create()
    {
        $suppliers = Supplier::all();

        return view('supplier.create', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $validated =$request->validate([
            'supplier'=> ['required'],
            'address' => ['required'],
            'contact_number' => ['required'],
            'email_address' => ['required', 'email'],
        ]);

         // Create a new record
         $supplierModel = new Supplier();
         $supplierModel->create($validated);
        
        return redirect('/suppliers')->with('message_success', 'Supplier Successfully Saved!');
    }

    
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view ('supplier.edit',  compact('supplier'));
    }

    public function update (Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'supplier'=> 'required',
            'address' => 'required',
            'contact_number' => 'required',
            'email_address' => 'required', 'email',
        ]);

        $supplier->update($validated); 

        return redirect('/suppliers')-> with ('message_success', 'Supplier Successfully updated.');
    }

    public function delete($id){
        $supplier = Supplier::find($id);
        return view ('supplier.delete', compact('supplier'));
    }

    public function destroy(Request $request, Supplier $supplier){
        $supplier->delete($request);

        return redirect('/suppliers')-> with ('message_success', 'Supplier Successfully deleted.');

    }
}
