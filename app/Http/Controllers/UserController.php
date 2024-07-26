<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Staff;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function details()
    {
        $user = Auth::user();
        Log::info('Authenticated user: ', ['user' => $user]);

        $staff = Staff::where('email', $user->email)->first();
        Log::info('Staff details: ', ['staff' => $staff]);

        if (!$staff) {
            return redirect()->route('dashboard')->with('error', 'Staff details not found for email.' . $user->email);
        }
        // Fetch bookstore details if needed (assuming a relationship exists)

        $bookstore = $user->bookstore; // Adjust according to your database structure
        return view('userDetails', compact('staff', 'bookstore'));
    }
}
