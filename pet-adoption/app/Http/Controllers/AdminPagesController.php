<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use App\Models\Adoption;

class AdminPagesController extends Controller
{
    public function managePet()
    {
        // Retrieve only available pets from the database
        $pets = Pet::where('adoption_status', 'available')->get();

        // Pass the pets to the view
        return view('admin.pages.manage_pet', compact('pets'));
    }

    public function notification()
    {
        return view('admin.pages.notification');
    }

    public function report()
    {
        $availablePets = Pet::where('adoption_status', 'available')->get();
        $totalAdoptedPets = Pet::where('adoption_status', 'adopted')->count();

        return view('admin.pages.report', compact('availablePets', 'totalAdoptedPets'));
    }

    public function petDocument()
    {
        $adoptions = Adoption::all();
        return view('admin.pages.pet_document', compact('adoptions'));
    }
}