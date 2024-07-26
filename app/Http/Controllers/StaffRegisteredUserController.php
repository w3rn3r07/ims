<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Bookstore;
use App\Models\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rules;

class StaffRegisteredUserController extends Controller
{
    public function create()
    {
        $bookstores = Bookstore::all();
        $roles = Role::all();
        return view('auth.register-staffdetails', compact('bookstores', 'roles'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'fname' => ['required', 'string', 'max:50'],
            'lname' => ['required', 'string', 'max:50'],
            'username' => ['required', 'string', 'max:30', 'unique:staff'],
            'email' => ['required', 'string', 'email', 'max:225', 'unique:staff'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone_no' => ['required', 'string', 'max:10'],
            'emergency_no' => ['required', 'string', 'max:10'],
            'city' => ['required', 'string', 'max:90'],
            'street_name' => ['required', 'string', 'max:50'],
            'postcode' => ['required', 'string', 'max:8'],
            'bookstore_id' => ['required', 'string', 'exists:bookstore,bookstore_id'],
            'role_id' => ['required', 'string', 'exists:role,role_id'],
        ]);

        $staff = Staff::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'phone_no' => $request->phone_no,
            'emergency_no' => $request->emergency_no,
            'email' => $request->email,
            'city' => $request->city,
            'street_name' => $request->street_name,
            'postcode' => $request->postcode,
            'bookstore_id' => $request->bookstore_id,
            'role_id' => $request->role_id,
        ]);

        event(new Registered($staff));

        auth()->guard('staff')->login($staff);

        return redirect()->route('dashboard');
    }
}
