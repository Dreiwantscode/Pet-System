@extends('layouts.app')

@section('content')
    <h1>Adoption Form</h1>
    <form action="{{ route('adoption.submit') }}" method="POST">
        @csrf
        <h2>Personal Information</h2>
        <div>
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" required>
        </div>
        <div>
            <label for="middle_name">Middle Name:</label>
            <input type="text" id="middle_name" name="middle_name">
        </div>
        <div>
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" required>
        </div>
        <div>
            <label for="current_address">Current Address:</label>
            <input type="text" id="current_address" name="current_address" required>
        </div>
        <div>
            <label for="purok_street">Purok/Street:</label>
            <input type="text" id="purok_street" name="purok_street" required>
        </div>
        <div>
            <label for="barangay">Barangay:</label>
            <input type="text" id="barangay" name="barangay" required>
        </div>
        <div>
            <label for="city_province">City/Province:</label>
            <input type="text" id="city_province" name="city_province" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" required>
        </div>
        <div>
            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required>
        </div>
        <div>
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div>
            <label for="user_id">User ID (optional):</label>
            <input type="text" id="user_id" name="user_id">
        </div>

        <h2>Pet Information</h2>
        <div>
            <label for="pet_name">Pet Name:</label>
            <input type="text" id="pet_name" name="pet_name" value="{{ $pet->name ?? '' }}" required>
        </div>
        <div>
            <label for="pet_id">Pet ID:</label>
            <input type="text" id="pet_id" name="pet_id" value="{{ $pet->id ?? '' }}" required>
        </div>
        <div>
            <label for="breed">Breed:</label>
            <input type="text" id="breed" name="breed" value="{{ $pet->breed ?? '' }}" required>
        </div>
        <div>
            <label for="color">Color:</label>
            <input type="text" id="color" name="color" value="{{ $pet->color_markings ?? '' }}" required>
        </div>
        <div>
            <label for="pet_age">Age:</label>
            <input type="number" id="pet_age" name="pet_age" value="{{ $pet->age ?? '' }}" required>
        </div>

        <button type="submit">Submit</button>
    </form>
@endsection
