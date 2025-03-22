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
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body p-5">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h3 class="fw-bold" style="color: #C6A56D;">Pet Details</h3>
                                <a href="{{ route('admin.pets.index') }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-left"></i> Back to List
                                </a>
                            </div>
                            
                            <div class="row">
                                <!-- Pet Image -->
                                <div class="col-md-4 mb-4">
                                    <div class="text-center">
                                        @if($pet->pet_image)
                                            <img src="{{ Storage::url($pet->pet_image) }}" alt="{{ $pet->name }}" class="img-fluid rounded shadow" style="max-height: 300px; object-fit: cover;">
                                        @else
                                            <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 300px;">
                                                <i class="bi bi-image text-secondary" style="font-size: 3rem;"></i>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                
                                <!-- Pet Information -->
                                <div class="col-md-8">
                                    <h4 class="mb-3">{{ $pet->name }}</h4>
                                    <p><strong>Species:</strong> {{ ucfirst($pet->species) }}</p>
                                    <p><strong>Breed:</strong> {{ $pet->breed ?: 'Not specified' }}</p>
                                    <p><strong>Age:</strong> {{ $pet->age }} {{ $pet->age == 1 ? 'year' : 'years' }}</p>
                                    <p><strong>Color/Markings:</strong> {{ $pet->color_markings }}</p>
                                    <p><strong>Sex:</strong> {{ ucfirst($pet->sex) }}</p>
                                    <p><strong>Health Status:</strong> {{ $pet->health_status === 'vaccinated' ? 'Vaccinated' : 'Not Vaccinated' }}</p>
                                    <p><strong>Neutered/Spayed:</strong> {{ ucfirst($pet->neutered_spayed) }}</p>
                                    <p><strong>Date Added:</strong> {{ $pet->date_added->format('F d, Y') }}</p>
                                    @if($pet->description)
                                        <p><strong>Description:</strong> {{ $pet->description }}</p>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="mt-4">
                                <a href="{{ route('admin.pets.edit', $pet->id) }}" class="btn btn-primary">
                                    <i class="bi bi-pencil"></i> Edit Pet
                                </a>
                                <form action="{{ route('admin.pets.delete', $pet->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash"></i> Delete Pet
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .side-nav {
        background: white;
        height: 100vh;
        position: fixed;
        width: 60px;
        transition: width 0.3s ease;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .nav-expanded {
        width: 200px;
    }

    .nav-header {
        display: flex;
        justify-content: flex-end;
        padding: 1rem;
    }

    .nav-toggle {
        color: #C6A56D;
        padding: 0.5rem;
        border: none;
    }

    .nav-link {
        display: flex;
        align-items: center;
        padding: 0.8rem 1rem;
        color: #6c757d;
        text-decoration: none;
        white-space: nowrap;
        gap: 12px;
        border-radius: 8px;
        margin: 0 0.5rem;
    }

    .nav-link i {
        font-size: 1.2rem;
        min-width: 24px;
        text-align: center;
    }

    .nav-text {
        opacity: 0;
        transition: opacity 0.2s ease;
    }

    .nav-expanded .nav-text {
        opacity: 1;
    }

    .nav-link:hover, .nav-link.active {
        background-color: rgba(198, 165, 109, 0.1);
        color: #C6A56D;
    }

    /* Adjust main content */
    .col-md-10 {
        margin-left: 60px;
        transition: margin-left 0.3s ease;
    }

    .nav-expanded + .col-md-10 {
        margin-left: 200px;
    }

    .form-control:focus, .form-select:focus, .form-check-input:focus {
        border-color: #D6B89A;
        box-shadow: 0 0 0 0.25rem rgba(214, 184, 154, 0.25);
    }
    
    .form-check-input:checked {
        background-color: #C6A56D;
        border-color: #C6A56D;
    }

    @media (max-width: 768px) {
        .side-nav {
            position: relative;
            width: 100%;
            height: auto;
        }

        .nav-expanded {
            width: 100%;
        }

        .nav-text {
            opacity: 1;
        }

        .col-md-10 {
            margin-left: 0 !important;
        }

        .nav-header {
            display: none;
        }
    }
</style>
@endsection