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
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="bi bi-house-door"></i>
                            <span class="nav-text">Home</span>
                        </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="nav-link {{ Request::is('pets*') ? 'active' : '' }}" 
                           href="{{ route('user.pages.pets') }}">
                            <i class="bi bi-heart"></i>
                            <span class="nav-text">Our Animals</span>
                        </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="nav-link {{ Request::is('user.pages.about') ? 'active' : '' }}" 
                           href="{{ route('user.pages.about') }}">
                            <i class="bi bi-info-circle"></i>
                            <span class="nav-text">About Us</span>
                        </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="nav-link {{ Request::is('support') ? 'active' : '' }}" 
                           href="{{ route('user.pages.support') }}">
                            <i class="bi bi-hand-thumbs-up"></i>
                            <span class="nav-text">Support Us</span>
                        </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="nav-link {{ Request::is('faq') ? 'active' : '' }}" 
                           href="{{ route('user.pages.faq') }}">
                            <i class="bi bi-question-circle"></i>
                            <span class="nav-text">FAQ</span>
                        </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" 
                           href="{{ route('user.pages.contact') }}">
                            <i class="bi bi-envelope"></i>
                            <span class="nav-text">Contact Us</span>
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
                        <div class="card-body p-5">
                            <!-- Welcome Section -->
                            <h3 class="text-center mb-4 fw-bold" style="color: #C6A56D;">Hello, {{ Auth::user()->first_name }}!</h3>

                           
                            <!-- Stats Cards -->
                            <div class="row mb-5">
                                <div class="col-md-4">
                                    <div class="card border-0 shadow-sm text-center p-4 h-100">
                                        <h4 class="mb-2" style="color: #C6A56D;">{{ $pendingApplications ?? 0 }}</h4>
                                        <p class="text-muted mb-0">Pending Applications</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card border-0 shadow-sm text-center p-4 h-100">
                                        <h4 class="mb-2" style="color: #C6A56D;">{{ $approvedAdoptions ?? 0 }}</h4>
                                        <p class="text-muted mb-0">Approved Adoptions</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card border-0 shadow-sm text-center p-4 h-100">
                                        <h4 class="mb-2" style="color: #C6A56D;">{{ $favorites ?? 0 }}</h4>
                                        <p class="text-muted mb-0">Favorites</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Adoption History Dropdown -->
                            <div class="mb-4">
                                <div class="dropdown w-100">
                                    <button class="btn btn-lg w-100 text-start d-flex justify-content-between align-items-center" 
                                        type="button" 
                                        data-bs-toggle="collapse" 
                                        data-bs-target="#adoptionHistory" 
                                        aria-expanded="false"
                                        style="background-color: rgba(198, 165, 109, 0.1); color: #C6A56D; border-radius: 10px;">
                                        Your Adoption History
                                        <i class="bi bi-chevron-down"></i>
                                    </button>
                                    
                                    <div class="collapse mt-3" id="adoptionHistory">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Pet Name</th>
                                                        <th>Status</th>
                                                        <th>Application Date</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($adoptionHistory ?? [] as $adoption)
                                                        <tr>
                                                            <td>{{ $adoption->pet->name }}</td>
                                                            <td>
                                                                <span class="badge" 
                                                                    style="background-color: #C6A56D;">
                                                                    {{ $adoption->status }}
                                                                </span>
                                                            </td>
                                                            <td>{{ $adoption->created_at->format('M d, Y') }}</td>
                                                            <td>
                                                                <a href="{{ route('adoptions.show', $adoption->id) }}" 
                                                                   class="btn btn-sm"
                                                                   style="background-color: rgba(198, 165, 109, 0.1); 
                                                                          color: #C6A56D;">
                                                                    View Details
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="4" class="text-center text-muted">
                                                                No adoption history found.
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .form-control:focus, .form-select:focus {
        border-color: #D6B89A;
        box-shadow: 0 0 0 0.25rem rgba(214, 184, 154, 0.25);
    }
    
    .btn:hover {
        background: linear-gradient(to right, #C6A56D, #D6B89A) !important;
        color: white !important;
    }
    
    .table th {
        color: #6c757d;
        font-weight: 500;
        border-top: none;
    }
    
    .table td {
        vertical-align: middle;
    }
    
    .card {
        transition: transform 0.2s;
    }
    
    .card:hover {
        transform: translateY(-5px);
    }

    /* Side Navigation Styles */
    .side-nav {
        background: white;
        height: 100vh;
        position: fixed;
        width: 60px;
        transition: width 0.3s ease;
        overflow: hidden;
        border-right: 1px solid rgba(198, 165, 109, 0.2);
    }

    .nav-expanded {
        width: 200px;
    }

    .nav-header {
        display: flex;
        justify-content: flex-end;
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
    }
</style>
@endsection

@push('styles')
<link href="{{ asset('css/userdashboard.css') }}" rel="stylesheet">
@endpush