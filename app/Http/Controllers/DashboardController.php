<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Redirect all authenticated users to the Filament dashboard
     * The panel will automatically show admin resources or user pages based on role
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Single panel at /admin for all users
        // Admins see: Admin resources (Users, Products, etc.)
        // Customers/Suppliers see: My Account pages (My Orders, My Profile, etc.)
        return redirect('/admin');
    }
}
