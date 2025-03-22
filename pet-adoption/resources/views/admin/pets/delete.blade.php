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
                            <i class="bi bi-house-door"></i>
                            <span class="nav-text">Home</span>
                        </a>
                    </li>

                    <li class="nav-item mb-3">
                        <a class="nav-link {{ Request::is('pets*') ? 'active' : '' }}" 
                          {{-- href="{{ route('pets.index') }}" --}}> 
                            <i class="bi bi-heart"></i>
                            <span class="nav-text">Manage Pets</span>
                        </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="nav-link {{ Request::is('notifications*') ? 'active' : '' }}" 
                        {{-- href="{{ route('pets.index') }}" --}}> 
                            <i class="bi bi-bell"></i>
                            <span class="nav-text">Notifications</span>
                        </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="nav-link {{ Request::is('reports*') ? 'active' : '' }}" 
                        {{-- href="{{ route('reports.index') }}" --}}>
                            <i class="bi bi-file-earmark-bar-graph"></i>
                            <span class="nav-text">Reports</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-10">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body p-5 text-center">
                            <div class="mb-4">
                                <i class="bi bi-exclamation-triangle-fill text-danger" style="font-size: 3rem;"></i>
                            </div>
                            <h3 class="fw-bold mb-4" style="color: #C6A56D;">Confirm Delete</h3>
                            
                            <p class="mb-4">Are you sure you want to delete <strong>{{ $pet->name }}</strong>?</p>
                            
                            <div class="row mb-4">
                                <div class="col-md-6 mx-auto">
                                    @if($pet->image_path)
                                        <img src="{{ Storage::url($pet->image_path) }}" alt="{{ $pet->name }}" class="img-fluid rounded mb-3" style="max-height: 200px; object-fit: cover;">
                                    @endif
                                </div>
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-md-8 mx-auto">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th class="text-start">Species:</th>
                                            <td class="text-start">
                                                {{ ucfirst($pet->species) }}
                                                @if($pet->species === 'other' && $pet->other_species)
                                                    ({{ $pet->other_species }})
                                                @endif
                                            </td>
                                        </tr>
                                        @if($pet->breed)
                                        <tr>
                                            <th class="text-start">Breed:</th>
                                            <td class="text-start">{{ $pet->breed }}</td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <th class="text-start">Age:</th>
                                            <td class="text-start">{{ $pet->age }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-start">Adoption Status:</th>
                                            <td class="text-start">
                                                @if($pet->adoption_status === 'available')
                                                    <span class="badge bg-success">Available</span>
                                                @elseif($pet->adoption_status === 'adopted')
                                                    <span class="badge bg-primary">Adopted</span>
                                                @else
                                                    <span class="badge bg-warning text-dark">Lost & Found</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            
                            <p class="text-danger mb-4">This action cannot be undone.</p>
                            
                            <div class="d-flex justify-content-center gap-3">
                                <a href="{{ route('pets.index') }}" class="btn btn-secondary px-4">
                                    Cancel
                                </a>
                                
                                <form action="{{ route('pets.destroy', $pet->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger px-4">
                                        Delete Pet
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