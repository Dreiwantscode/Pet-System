@extends('layouts.app')

@section('content')
    <h1>Adoption Document</h1>
    <h2>Personal Information</h2>
    <p><strong>First Name:</strong> {{ $adoption->first_name }}</p>
    <p><strong>Middle Name:</strong> {{ $adoption->middle_name }}</p>
    <p><strong>Last Name:</strong> {{ $adoption->last_name }}</p>
    <p><strong>Current Address:</strong> {{ $adoption->current_address }}</p>
    <p><strong>Purok/Street:</strong> {{ $adoption->purok_street }}</p>
    <p><strong>Barangay:</strong> {{ $adoption->barangay }}</p>
    <p><strong>City/Province:</strong> {{ $adoption->city_province }}</p>
    <p><strong>Email:</strong> {{ $adoption->email }}</p>
    <p><strong>Phone Number:</strong> {{ $adoption->phone_number }}</p>
    <p><strong>Age:</strong> {{ $adoption->age }}</p>
    <p><strong>Gender:</strong> {{ $adoption->gender }}</p>
    <p><strong>User ID:</strong> {{ $adoption->user_id }}</p>

    <h2>Pet Information</h2>
    <p><strong>Pet Name:</strong> {{ $adoption->pet_name }}</p>
    <p><strong>Pet ID:</strong> {{ $adoption->pet_id }}</p>
    <p><strong>Breed:</strong> {{ $adoption->breed }}</p>
    <p><strong>Color:</strong> {{ $adoption->color }}</p>
    <p><strong>Age:</strong> {{ $adoption->pet_age }}</p>
@endsection
