<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pet;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch the total number of users
        $totalUsers = User::count();
        // Fetch the total number of pets
        $totalPets = Pet::count();
        // Define a rating (this can be fetched from the database or calculated)
        $rating = 85; // Example rating

        // Pass the variables to the view
        return view('admin.dashboard.dashboard', compact('totalUsers', 'totalPets', 'rating'));
    }
}
