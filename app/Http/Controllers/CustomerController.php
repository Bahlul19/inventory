<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addCustomer()
    {
        return view('Customer.add_customer');
    }

    public function storeData(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|unique:customers|max:25|min:2',
            'account_holder' => 'required|unique:customers|max:25|min:2',
            'account_number' => 'required|unique:customers|max:25|min:2',
        ]);
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->shopname = $request->shopname;
        $customer->account_holder = $request->account_holder;
        $customer->account_number = $request->account_number;
        $customer->bank_name = $request->bank_name;
        $customer->bank_branch = $request->bank_branch;
        $customer->city = $request->city;
        $customer->save();

        if ($customer->save()) {
            $notification = array(
                'message' => 'Customer Added Successfully',
                'alert-type' => 'success',
            );

            return Redirect()->route('all.customer')->with($notification);
        } else {
            return back()->with('error', 'Customer Data Add is not inserted successfully');
        }
    }

    public function getAllCustomer()
    {
        $customer = Customer::all();

        return view('Customer.all_customer')->with('customer', $customer);
    }

    public function viewIndividualCustomer($id)
    {
        $customer = Customer::findorfail($id);
        return view ('Customer.view_customer')->with('customer', $customer);

    }

    public function editCustomer($id)
    {
        $customer = Customer::findorfail($id);
        return view ('Customer.edit_customer')->with('customer', $customer);
    }

    public function deleteCustomer($id)
    {
        $customer =  Customer::findorfail($id);
        $customerDelete = $customer->delete();
        if($customerDelete)
        {
            $notification = array(
                'message' => 'Customer  Deleted Successfully',
                'alert-type' => 'success',
            );

            return Redirect()->route('all.customer')->with($notification);
        } else {
            return back()->with('error', 'Customer is not deleted successfully');
        }
    }

    public function updateCutomer(Request $request, $id)
    {
        $customer = Customer::findorfail($id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->shopname = $request->shopname;
        $customer->account_holder = $request->account_holder;
        $customer->account_number = $request->account_number;
        $customer->bank_name = $request->bank_name;
        $customer->bank_branch = $request->bank_branch;
        $customer->city = $request->city;
        $saveCustomerData = $customer->save();
        if($saveCustomerData)
        {
                $notification = array(
                    'message' => 'Customer Updated Successfully',
                    'alert-type' => 'success',
                );
    
                return Redirect()->route('all.customer')->with($notification);
            } else {
                return back()->with('error', 'Customer Data Updated is not inserted successfully');
        }
    }

}
