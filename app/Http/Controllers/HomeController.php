<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    //Password Changes Method

    public function passwordChange()
    {
        return view('auth.password_change');
    }

    public function updatePassword(Request $request)
    {
        $password = Auth::user()->password;
        $oldPassword = $request->old_password;

        if (Hash::check($oldPassword, $password)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $userDataSave = $user->save();
            $userLogout = Auth::logout();

            if ($userDataSave) {
                $notification = array(
                    'message' => 'Password Change Successfully',
                    'alert-type' => 'success',
                );

                return Redirect()->route('login')->with($notification);
            } else {
                return back()->with('error', 'Password not matched');
            }
        } else {
            return Redirect()->back();
        }
    }
}
