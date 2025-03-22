@extends('layouts.app')

@section('content')
    <h1>Reports</h1>
    <p>This is the Reports page.</p>

    <h2>Available Pets</h2>
    <button onclick="printSection('availablePetsSection')">Print Available Pets</button>
    <div id="availablePetsSection">
        <ul>
            @if(count($availablePets) > 1 && !request()->has('view_all'))
                <li>{{ $availablePets[0]->name }} - {{ $availablePets[0]->breed }}</li>
                <li><a href="{{ request()->fullUrlWithQuery(['view_all' => 1]) }}">View All</a></li>
            @else
                @foreach($availablePets as $pet)
                    <li>{{ $pet->name }} - {{ $pet->breed }}</li>
                @endforeach
            @endif
        </ul>
    </div>

    <h2>Total Pets Adopted</h2>
    <button onclick="printSection('totalAdoptedPetsSection')">Print Total Pets Adopted</button>
    <div id="totalAdoptedPetsSection">
        <p>{{ $totalAdoptedPets }}</p>
    </div>

    <script>
        function printSection(sectionId) {
            var printContents = document.getElementById(sectionId).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endsection