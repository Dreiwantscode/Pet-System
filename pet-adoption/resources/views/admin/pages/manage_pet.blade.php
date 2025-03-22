@extends('layouts.app')

@section('content')
<div class="container-fluid" x-data="{ isExpanded: false }">
    <div class="row">
        <!-- Left Side Navigation -->
        <div class="col-auto px-0">
            <div class="side-nav" :class="{ 'nav-expanded': isExpanded }">
                <div class="nav-header px-3 py-3">
                    <button @click="isExpanded = !isExpanded" class="btn btn-link p-0 nav-toggle">
                        <i class="bi" :class="isExpanded ? 'bi-chevron-left' : 'bi-chevron-right'"></i>
                    </button>
                </div>
                <ul class="nav flex-column px-2">
                    <li class="nav-item mb-3">
                        <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}" 
                           href="{{ route('admin.dashboard') }}">
                            <i class="bi bi-house-door" style="color: #C6A56D;"></i>
                            <span class="nav-text" style="color: #C6A56D;">Home</span>
                        </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="nav-link {{ Request::is('admin/manage_pet') ? 'active' : '' }}" 
                           href="{{ route('admin.pages.manage_pet') }}">
                            <i class="bi bi-heart" style="color: #C6A56D;"></i>
                            <span class="nav-text" style="color: #C6A56D;">Manage Pets</span>
                        </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="nav-link {{ Request::is('admin/notification') ? 'active' : '' }}" 
                           href="{{ route('admin.pages.notification') }}">
                            <i class="bi bi-bell" style="color: #C6A56D;"></i>
                            <span class="nav-text" style="color: #C6A56D;">Notifications</span>
                        </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="nav-link {{ Request::is('admin/report') ? 'active' : '' }}" 
                           href="{{ route('admin.pages.report') }}">
                            <i class="bi bi-file-earmark-bar-graph" style="color: #C6A56D;"></i>
                            <span class="nav-text" style="color: #C6A56D;">Reports</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-10">
            <h1 style="color: #C6A56D;">Manage Pet</h1>
            <p style="color: #C6A56D;">This is the Manage Pet page.</p>

            <div class="mt-4">
            <a href="{{ route('admin.pages.pet_document') }}" class="btn btn-primary" style="background-color: #C6A56D; border-color: #C6A56D;">Pet Document</a>
                <a href="{{ route('admin.pets.add') }}" class="btn btn-primary" style="background-color: #C6A56D; border-color: #C6A56D;">Add Pet</a>
                <!-- Update the View Pet button to include a valid pet ID dynamically -->
                @if($pets->isNotEmpty())
                    <a href="{{ route('admin.pets.view', ['pet' => $pets->first()->id]) }}" class="btn btn-primary" style="background-color: #C6A56D; border-color: #C6A56D;">View Pet</a>
                @else
                    <p class="mt-3" style="color: #C6A56D;">No pets available to view.</p>
                @endif
                
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Species</th>
                        <th>Age</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pets as $pet)
                        <tr>
                            <td>{{ $pet->name }}</td>
                            <td>{{ $pet->species }}</td>
                            <td>{{ $pet->age }}</td>
                            <td>
                                <a href="{{ route('admin.pets.edit', ['pet' => $pet->id]) }}" class="btn btn-primary" @if($pet->adoption_status == 'adopted') disabled @endif>Edit</a>
                                <a href="{{ route('admin.pets.view', ['pet' => $pet->id]) }}" class="btn btn-info">View</a>
                                <form action="{{ route('admin.pets.delete', ['pet' => $pet->id]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" @if($pet->adoption_status == 'adopted') disabled @endif>Delete</button>
                                </form>
                                @if($pet->adoption_status == 'available')
                                    <button onclick="window.location.href='{{ route('adoption.form', ['pet_id' => $pet->id, 'name' => $pet->name, 'breed' => $pet->breed, 'age' => $pet->age, 'gender' => $pet->gender]) }}'" class="btn btn-primary" style="background-color: #C6A56D; border-color: #C6A56D;">Adopt</button>
                                @endif
                                <a href="{{ route('adoption.document', ['pet_id' => $pet->id]) }}" class="btn btn-secondary">Document</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
