<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PetController extends Controller
{
    // Method to show the form for creating a new pet
    public function create()
    {
        return view('admin.pets.add');
    }

    // Method to store a new pet
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string',
            'other_species' => 'nullable|string|max:255',
            'breed' => 'nullable|string|max:255',
            'age' => 'required|integer|min:0',
            'color_markings' => 'required|string|max:255',
            'sex' => 'required|string',
            'health_status' => 'required|string',
            'neutered_spayed' => 'required|string',
            'adoption_status' => 'required|string',
            'date_added' => 'required|date',
            'pet_image' => 'required|image|max:8192',
            'description' => 'nullable|string',
        ]);

        // Handle the file upload
        if ($request->hasFile('pet_image')) {
            $validatedData['pet_image'] = $request->file('pet_image')->store('pet_images', 'public');
        }

        // Create a new pet record
        Pet::create($validatedData);

        // Redirect to a specific route with a success message
        return redirect()->route('admin.pets.index')->with('success', 'Pet added successfully.');
    }

    // Method to show a list of pets
    public function index(Request $request)
    {
        $query = Pet::query();

        // Apply search filter
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('species', 'like', '%' . $request->search . '%')
                  ->orWhere('breed', 'like', '%' . $request->search . '%');
        }

        // Apply species filter
        if ($request->filled('species')) {
            $query->where('species', $request->species);
        }

        // Apply adoption status filter
        if ($request->filled('adoption_status')) {
            $query->where('adoption_status', $request->adoption_status);
        }

        $pets = $query->get();

        return view('admin.pets.index', compact('pets'));
    }

    // Method to show the form for editing a pet
    public function edit($id)
    {
        $pet = Pet::findOrFail($id);
        return view('admin.pets.edit', compact('pet'));
    }

    public function show(Pet $pet)
    {
        return view('admin.pets.view', compact('pet'));
    }

    public function update(Request $request, Pet $pet)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string',
            'other_species' => 'nullable|string|max:255',
            'breed' => 'nullable|string|max:255',
            'age' => 'required|integer|min:0',
            'color_markings' => 'required|string|max:255',
            'sex' => 'required|string|in:male,female',
            'health_status' => 'required|string|in:vaccinated,not_vaccinated',
            'neutered_spayed' => 'required|string|in:yes,no',
            'adoption_status' => 'required|string|in:available,adopted,lost_found',
            'date_added' => 'required|date',
            'description' => 'nullable|string',
            'pet_image' => 'nullable|image|max:8192', // Max size: 8MB
        ]);

        // Update the pet's attributes
        $pet->fill($validated);

        // Handle the pet image upload if a new image is provided
        if ($request->hasFile('pet_image')) {
            // Delete the old image if it exists
            if ($pet->pet_image) {
                Storage::disk('public')->delete($pet->pet_image);
            }

            // Store the new image and update the path
            $pet->pet_image = $request->file('pet_image')->store('pet_images', 'public');
        }

        // Save the updated pet
        $pet->save();

        // Redirect back to the pets index page with a success message
        return redirect()->route('admin.pets.index')->with('success', 'Pet updated successfully.');
    }

    public function destroy(Pet $pet)
    {
        // Delete the pet image if it exists
        if ($pet->pet_image) {
            Storage::delete($pet->pet_image);
        }

        // Delete the pet record
        $pet->delete();

        // Redirect back to the pets index page with a success message
        return redirect()->route('pets.index')->with('success', 'Pet deleted successfully.');
    }
}