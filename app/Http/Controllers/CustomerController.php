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

}
