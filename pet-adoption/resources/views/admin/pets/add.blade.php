@extends('layouts.app')

@section('content')
<div class="container-fluid" x-data="{ isExpanded: false, showOtherSpecies: false }">
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
                        <a class="nav-link {{ Request::is('pets*') ? 'active' : '' }}">
                            <i class="bi bi-heart" style="color: #C6A56D;"></i>
                            <span class="nav-text" style="color: #C6A56D;">Manage Pets</span>
                        </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="nav-link {{ Request::is('notifications*') ? 'active' : '' }}">
                            <i class="bi bi-bell" style="color: #C6A56D;"></i>
                            <span class="nav-text" style="color: #C6A56D;">Notifications</span>
                        </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="nav-link {{ Request::is('reports*') ? 'active' : '' }}">
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
                            <h3 class="text-center mb-4 fw-bold" style="color: #C6A56D;">Add New Pet</h3>
                            
                            <form action="{{ route('admin.pets.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="row">
                                    <!-- Left Column -->
                                    <div class="col-md-6 pe-md-4">
                                        <div class="mb-3">
                                            <label for="name" class="form-label" style="color: #C6A56D;">Pet Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                                id="name" name="name" value="{{ old('name') }}" required>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label" style="color: #C6A56D;">Species <span class="text-danger">*</span></label>
                                            <div class="d-flex gap-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="species" 
                                                        id="dog" value="dog" @click="showOtherSpecies = false"
                                                        {{ old('species') == 'dog' ? 'checked' : '' }} required>
                                                    <label class="form-check-label" for="dog" style="color: #C6A56D;">Dog</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="species" 
                                                        id="cat" value="cat" @click="showOtherSpecies = false"
                                                        {{ old('species') == 'cat' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="cat" style="color: #C6A56D;">Cat</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="species" 
                                                        id="other" value="other" @click="showOtherSpecies = true"
                                                        {{ old('species') == 'other' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="other" style="color: #C6A56D;">Other</label>
                                                </div>
                                            </div>
                                            @error('species')
                                                <div class="text-danger small">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="mb-3" x-show="showOtherSpecies">
                                            <label for="other_species" class="form-label" style="color: #C6A56D;">Specify Other Species <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('other_species') is-invalid @enderror" 
                                                id="other_species" name="other_species" value="{{ old('other_species') }}"
                                                x-bind:required="showOtherSpecies">
                                            @error('other_species')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="breed" class="form-label" style="color: #C6A56D;">Breed</label>
                                            <input type="text" class="form-control @error('breed') is-invalid @enderror" 
                                                id="breed" name="breed" value="{{ old('breed') }}">
                                            @error('breed')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="age" class="form-label" style="color: #C6A56D;">Age <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control @error('age') is-invalid @enderror" 
                                                id="age" name="age" value="{{ old('age') }}" min="0" required>
                                            @error('age')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="color_markings" class="form-label" style="color: #C6A56D;">Color/Markings <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('color_markings') is-invalid @enderror" 
                                                id="color_markings" name="color_markings" value="{{ old('color_markings') }}" required>
                                            @error('color_markings')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <!-- Right Column -->
                                    <div class="col-md-6 ps-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" style="color: #C6A56D;">Sex <span class="text-danger">*</span></label>
                                            <div class="d-flex gap-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="sex" 
                                                        id="male" value="male" {{ old('sex') == 'male' ? 'checked' : '' }} required>
                                                    <label class="form-check-label" for="male" style="color: #C6A56D;">Male</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="sex" 
                                                        id="female" value="female" {{ old('sex') == 'female' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="female" style="color: #C6A56D;">Female</label>
                                                </div>
                                            </div>
                                            @error('sex')
                                                <div class="text-danger small">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label" style="color: #C6A56D;">Health Status <span class="text-danger">*</span></label>
                                            <div class="d-flex gap-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="health_status" 
                                                        id="vaccinated" value="vaccinated" {{ old('health_status') == 'vaccinated' ? 'checked' : '' }} required>
                                                    <label class="form-check-label" for="vaccinated" style="color: #C6A56D;">Vaccinated</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="health_status" 
                                                        id="not_vaccinated" value="not_vaccinated" {{ old('health_status') == 'not_vaccinated' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="not_vaccinated" style="color: #C6A56D;">Not Vaccinated</label>
                                                </div>
                                            </div>
                                            @error('health_status')
                                                <div class="text-danger small">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label" style="color: #C6A56D;">Neutered/Spayed <span class="text-danger">*</span></label>
                                            <div class="d-flex gap-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="neutered_spayed" 
                                                        id="yes" value="yes" {{ old('neutered_spayed') == 'yes' ? 'checked' : '' }} required>
                                                    <label class="form-check-label" for="yes" style="color: #C6A56D;">Yes</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="neutered_spayed" 
                                                        id="no" value="no" {{ old('neutered_spayed') == 'no' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="no" style="color: #C6A56D;">No</label>
                                                </div>
                                            </div>
                                            @error('neutered_spayed')
                                                <div class="text-danger small">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label" style="color: #C6A56D;">Adoption Status <span class="text-danger">*</span></label>
                                            <div class="d-flex gap-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="adoption_status" 
                                                        id="available" value="available" {{ old('adoption_status') == 'available' ? 'checked' : '' }} required>
                                                    <label class="form-check-label" for="available" style="color: #C6A56D;">Available</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="adoption_status" 
                                                        id="adopted" value="adopted" {{ old('adoption_status') == 'adopted' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="adopted" style="color: #C6A56D;">Adopted</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="adoption_status" 
                                                        id="lost_found" value="lost_found" {{ old('adoption_status') == 'lost_found' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="lost_found" style="color: #C6A56D;">Lost & Found</label>
                                                </div>
                                            </div>
                                            @error('adoption_status')
                                                <div class="text-danger small">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="date_added" class="form-label" style="color: #C6A56D;">Date Rescued/Added <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control @error('date_added') is-invalid @enderror" 
                                                id="date_added" name="date_added" value="{{ old('date_added') ?? date('Y-m-d') }}" required>
                                            @error('date_added')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="pet_image" class="form-label" style="color: #C6A56D;">Pet Image <span class="text-danger">*</span></label>
                                            <input type="file" class="form-control @error('pet_image') is-invalid @enderror" 
                                                id="pet_image" name="pet_image" accept="image/*" required>
                                            <div class="form-text" style="color: #C6A56D;">Maximum file size: 8MB</div>
                                            @error('pet_image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <!-- Full Width -->
                                    <div class="col-12 mt-3">
                                        <div class="mb-3">
                                            <label for="description" class="form-label" style="color: #C6A56D;">Description</label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                                id="description" name="description" rows="4">{{ old('description') }}</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 mt-4 d-flex justify-content-between">
                                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary px-4">
                                            Cancel
                                        </a>
                                        <button type="submit" class="btn text-white px-4" style="background-color: #C6A56D;">
                                            Add Pet
                                        </button>
                                    </div>
                                </div>
                            </form>
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