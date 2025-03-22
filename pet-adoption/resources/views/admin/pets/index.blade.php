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
            <h1 class="text-center mb-4" style="color: #C6A56D;">Manage Pets</h1>

            <!-- Search and Filter Form -->
            <form method="GET" action="{{ route('admin.pets.index') }}" class="mb-4">
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text" style="background-color: #C6A56D; color: white;">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text" name="search" class="form-control" placeholder="Search by name, species, or breed" value="{{ request('search') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select name="species" class="form-select">
                            <option value="">Filter by Species</option>
                            <option value="dog" {{ request('species') == 'dog' ? 'selected' : '' }}>Dog</option>
                            <option value="cat" {{ request('species') == 'cat' ? 'selected' : '' }}>Cat</option>
                            <option value="other" {{ request('species') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="adoption_status" class="form-select">
                            <option value="">Filter by Adoption Status</option>
                            <option value="available" {{ request('adoption_status') == 'available' ? 'selected' : '' }}>Available</option>
                            <option value="adopted" {{ request('adoption_status') == 'adopted' ? 'selected' : '' }}>Adopted</option>
                            <option value="lost_found" {{ request('adoption_status') == 'lost_found' ? 'selected' : '' }}>Lost & Found</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100" style="background-color: #C6A56D; border-color: #C6A56D;">Filter</button>
                    </div>
                </div>
            </form>

            <!-- Pets Table -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Species</th>
                        <th>Age</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pets as $pet)
                        <tr>
                            <td>{{ $pet->name }}</td>
                            <td>{{ $pet->species }}</td>
                            <td>{{ $pet->age }}</td>
                            <td>
                                <a href="{{ route('admin.pets.edit', $pet->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ route('admin.pets.view', $pet->id) }}" class="btn btn-info btn-sm">View Details</a>
                                <form action="{{ route('admin.pets.delete', $pet->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No pets found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection