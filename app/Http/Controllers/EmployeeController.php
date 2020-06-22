<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addEmployee()
    {
        return view('Employee.add_employee');
    }

    public function storeData(Request $request)
    {
        $employee = new Employee();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->experience = $request->experience;
        $employee->salary = $request->salary;
        $employee->vacation = $request->vacation;
        $employee->city = $request->city;
        $photo = $request->file('photo');

        if ($photo) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($photo->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/assets/img/';
            $image_url = $upload_path.$image_full_name;
            $success = $photo->move($upload_path, $image_full_name);
            $employee->photo = $image_url;
            $storeData = $employee->save();
            if ($storeData) {
                $notification = array(
                    'message' => 'Employee Data Added Successfully',
                    'alert-type' => 'success',
                );

                return Redirect()->route('all.employee')->with($notification);
            } else {
                return back()->with('error', 'Employees Data inserted successfully');
            }
        } else {
            $employee = $employee->save();
            if ($employee) {
                $notification = array(
                    'message' => 'Employees Data Add Successfully',
                    'alert-type' => 'success',
                );

                return Redirect()->route('all.employee')->with($notification);
            } else {
                return back()->with('error', 'Employees Data Add is not inserted successfully');
            }
        }
    }

    public function getAllEmployee()
    {
        $employee = Employee::all();

        return view('Employee.all_employee')->with('employee', $employee);
    }

    public function editData(Request $request , $id)
    {
        $employee = Employee::findorfail($id);

        return view('Employee.edit_employee', compact('employee'));
    }

    public function deleteEmployee($id)
    {
        $employee = Employee::findorfail($id);
        $photo = $employee->photo;
        $employeeDelete = $employee->delete();

        if ($employeeDelete) {
            unlink($photo);
            $notification = array(
                'message' => 'Category Added Successfully',
                'alert-type' => 'success',
            );

            return Redirect()->route('all.employee')->with($notification);
        } else {
            return back()->with('error', 'Posts is not deleted successfully');
        }
    }

    public function updateEmployee(Request $request, $id)
    {
        $employee = Employee::findorfail($id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->experience = $request->experience;
        $employee->salary = $request->salary;
        $employee->vacation = $request->vacation;
        $employee->city = $request->city;
        $photo = $request->file('photo');

        if ($photo) {
            $image_name = hexdec(uniqid());
            $ext = strtolower($photo->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/assets/img/';
            $image_url = $upload_path.$image_full_name;
            $success = $photo->move($upload_path, $image_full_name);
            $employee->photo = $image_url;
            unlink($request->old_photo);
            $saveEmployeeData = $employee->save();
            if ($saveEmployeeData) {
                return Redirect()->route('all.employee')->with('success', 'Employees data updated successfully');
            } else {
                return back()->with('error', 'Employees data are not inserted successfully');
            }
        } else {
            $employee->photo = $request->old_photo;
            $EmployeeImageSave = $employee->save();
            if ($EmployeeImageSave) {
                return Redirect()->route('all.employee')->with('success', 'Employees data are updated successfully');
            } else {
                return back()->with('error', 'Employees data are not inserted successfully');
            }
        }
    }
}
