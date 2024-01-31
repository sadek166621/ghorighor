<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(){
        $supplier = Supplier::orderby('id','desc')->get();
        return view('admin.supplier.add-supplier',[
            'suppliers' =>$supplier
        ]);

    }

    private function savebasicbrandInfo(Request $request){
        $this->validate($request, [
            'supplier_name' => 'required|string|min:1',
        ]);
        $supplier = new Supplier();
        $supplier->supplier_name= $request->supplier_name;
        $supplier->email= $request->email;
        $supplier->phone_primary= $request->phone_primary;
        $supplier->phone_secondary= $request->phone_secondary;
        $supplier->address= $request->address;
        $supplier->publication_status= $request->publication_status;
        $supplier->save();
    }
    public function saveSupplier(Request $request){
        $this->savebasicbrandInfo($request);
        return redirect('/add-supplier')->with('message','Supplier save Successfully');
    }
    public function publishedSupplier($id){
        $brand = Supplier::find($id);
        $brand->publication_status= 0;
        $brand->save();
        return redirect('/add-supplier')->with('message','Supplier published Successfully');
    }
    public function unpublishedSupplier($id){
        $brand = Supplier::find($id);
        $brand->publication_status= 1;
        $brand->save();
        return redirect('/add-supplier')->with('message','Supplier unpublished Successfully');
    }
    public function deleteSupplier($id){
        $brand = Supplier::find($id);
        $brand->delete();
        return redirect('/add-supplier')->with('message','Supplier delete Successfully');
    }
}
