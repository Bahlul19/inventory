<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addSupplier()
    {
        return view('Suppliers.add_suppliers');
    }

    public function storeData(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|unique:customers|max:25|min:2',
            'account_holder' => 'required|unique:customers|max:25|min:2',
            'account_number' => 'required|unique:customers|max:25|min:2',
        ]);
        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        $supplier->account_holder = $request->account_holder;
        $supplier->account_number = $request->account_number;
        $supplier->bank_name = $request->bank_name;
        $supplier->bank_branch = $request->bank_branch;
        $supplier->shopname = $request->shopname;
        $supplier->area = $request->area;
        $supplier->city = $request->city;
        $photo = $request->file('photo');

        if ($photo) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($photo->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/assets/img/';
            $image_url = $upload_path.$image_full_name;
            $success = $photo->move($upload_path, $image_full_name);
            $supplier->photo = $image_url;
            $storeData = $supplier->save();
            if ($storeData) {
                $notification = array(
                    'message' => 'Suppliers Data Added Successfully',
                    'alert-type' => 'success',
                );

                return Redirect()->route('all.suppliers')->with($notification);
            } else {
                return back()->with('error', 'Suppliers Data inserted successfully');
            }
        } else {
            $supplier = $supplier->save();
            if ($supplier) {
                $notification = array(
                    'message' => 'Suppliers Data Add Successfully',
                    'alert-type' => 'success',
                );

                return Redirect()->route('all.suppliers')->with($notification);
            } else {
                return back()->with('error', 'Suppliers Data Add is not inserted successfully');
            }
        }
    }

    public function getAllSupplier()
    {
        $supplier = Supplier::all();

        return view('Suppliers.all_suppliers')->with('supplier', $supplier);
    }

    public function editSupplier(Request $request , $id)
    {
        $supplier = Supplier::findorfail($id);

        return view('Suppliers.edit_suppliers', compact('supplier'));
    }

    public function deleteSupplier($id)
    {
        $supplier = Supplier::findorfail($id);
        $photo = $supplier->photo;
        $supplierDelete = $supplier->delete();

        if ($supplierDelete) {
            unlink($photo);
            $notification = array(
                'message' => 'Category Added Successfully',
                'alert-type' => 'success',
            );

            return Redirect()->route('all.suppliers')->with($notification);
        } else {
            return back()->with('error', 'Posts is not deleted successfully');
        }
    }

    public function updateSupplier(Request $request, $id)
    {
        $supplier = Supplier::findorfail($id);
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        $supplier->account_holder = $request->account_holder;
        $supplier->account_number = $request->account_number;
        $supplier->bank_name = $request->bank_name;
        $supplier->bank_branch = $request->bank_branch;
        $supplier->shopname = $request->shopname;
        $supplier->area = $request->area;
        $supplier->city = $request->city;
        $photo = $request->file('photo');

        if ($photo) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($photo->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/assets/img/';
            $image_url = $upload_path.$image_full_name;
            $success = $photo->move($upload_path, $image_full_name);
            $supplier->photo = $image_url;
            $saveSupplierData = $supplier->save();
            if ($saveSupplierData) {
                return Redirect()->route('all.suppliers')->with('success', 'Supplier data updated successfully');
            } else {
                return back()->with('error', 'Supplier data are not inserted successfully');
            }
        } else {
            $supplier->photo = $request->old_photo;
            $supplierImageSave = $supplier->save();
            if ($supplierImageSave) {
                return Redirect()->route('all.suppliers')->with('success', 'Supplier data are updated successfully');
            } else {
                return back()->with('error', 'Supplier data are not inserted successfully');
            }
        }
    }

}
