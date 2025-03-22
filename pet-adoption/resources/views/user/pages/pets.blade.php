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
                        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <i class="bi bi-house-door"></i>
                            <span class="nav-text">Dashboard</span>
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
                            <span class="nav-text">Support Us</a>
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
            <h1 class="text-center mb-4" style="color: #C6A56D;">Our Animals</h1>
            <p class="text-center text-muted">Browse through our list of pets available for adoption.</p>

            <!-- Search Bar -->
            <div class="row mb-4">
                <div class="col-md-6 offset-md-3">
                    <form action="{{ route('user.pages.pets') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search pets by name" value="{{ request('search') }}">
                            <button class="btn btn-primary" type="submit" style="background-color: #C6A56D; border-color: #C6A56D;">
                                Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Pets List -->
            <div class="row">
                @forelse($pets ?? [] as $pet)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <img src="{{ $pet->pet_image ? Storage::url($pet->pet_image) : asset('images/default-pet.jpg') }}" 
                                 class="card-img-top" 
                                 alt="{{ $pet->name }}" 
                                 style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title" style="color: #C6A56D;">{{ $pet->name }}</h5>
                                <p class="card-text">
                                    <strong>Species:</strong> {{ ucfirst($pet->species) }}<br>
                                    <strong>Breed:</strong> {{ $pet->breed ?: 'Not specified' }}<br>
                                    <strong>Age:</strong> {{ $pet->age }} {{ $pet->age == 1 ? 'year' : 'years' }}<br>
                                    <strong>Color/Markings:</strong> {{ $pet->color_markings === 'blue' ? 'grey' : $pet->color_markings }}
                                </p>
                                <a href="{{ route('pets.view', $pet->id) }}" class="btn btn-primary" style="background-color: #C6A56D; border-color: #C6A56D;">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        <p class="text-center text-muted">No pets available at the moment. Please check back later.</p>
                    </div>
                @endforelse
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