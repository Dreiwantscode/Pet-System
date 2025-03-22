<?php

namespace App\Http\Controllers;

use App\Models\Adoption;
use App\Models\Pet;
use Illuminate\Http\Request;

class AdoptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Adoption $adoption)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Adoption $adoption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Adoption $adoption)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Adoption $adoption)
    {
        //
    }

    public function showForm(Request $request)
    {
        $pet = null;
        if ($request->has('pet_id')) {
            $pet = Pet::find($request->input('pet_id'));
        }
        return view('admin.pages.adoption_form', compact('pet'));
    }

    public function submitForm(Request $request)
    {
        // Validate and process the form data
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'current_address' => 'required|string|max:255',
            'purok_street' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'city_province' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:15',
            'age' => 'required|integer|min:1',
            'gender' => 'required|string|max:10',
            'user_id' => 'nullable|string|max:255',
            'pet_name' => 'required|string|max:255',
            'pet_id' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'pet_age' => 'required|integer|min:0',
        ]);

        // Save the data to the adoptions table
        $adoption = Adoption::create($validatedData);

        // Update the pet's adoption status to 'adopted'
        $pet = Pet::find($validatedData['pet_id']);
        $pet->adoption_status = 'adopted';
        $pet->save();

        return redirect()->route('adoption.form')->with('success', 'Adoption form submitted successfully!');
    }

    public function showDocument($pet_id)
    {
        $adoption = Adoption::where('pet_id', $pet_id)->firstOrFail();
        return view('admin.pages.adoption_document', compact('adoption'));
    }
}
