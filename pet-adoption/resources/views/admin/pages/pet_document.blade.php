@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 style="color: #C6A56D;">Pet Document</h1>
            <p style="color: #C6A56D;">This is the Pet Document page.</p>
            <button onclick="window.print()" class="btn btn-primary">Print</button>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Current Address</th>
                        <th>Purok Street</th>
                        <th>Barangay</th>
                        <th>City/Province</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>User ID</th>
                        <th>Pet Name</th>
                        <th>Pet ID</th>
                        <th>Breed</th>
                        <th>Color</th>
                        <th>Pet Age</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($adoptions as $adoption)
                    <tr>
                        <td>{{ $adoption->id }}</td>
                        <td>{{ $adoption->first_name }}</td>
                        <td>{{ $adoption->middle_name }}</td>
                        <td>{{ $adoption->last_name }}</td>
                        <td>{{ $adoption->current_address }}</td>
                        <td>{{ $adoption->purok_street }}</td>
                        <td>{{ $adoption->barangay }}</td>
                        <td>{{ $adoption->city_province }}</td>
                        <td>{{ $adoption->email }}</td>
                        <td>{{ $adoption->phone_number }}</td>
                        <td>{{ $adoption->age }}</td>
                        <td>{{ $adoption->gender }}</td>
                        <td>{{ $adoption->user_id }}</td>
                        <td>{{ $adoption->pet_name }}</td>
                        <td>{{ $adoption->pet_id }}</td>
                        <td>{{ $adoption->breed }}</td>
                        <td>{{ $adoption->color }}</td>
                        <td>{{ $adoption->pet_age }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
