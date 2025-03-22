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
                <ul class="nav flex-column">
                    <li class="nav-item mb-3">
                        <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}" 
                           href="{{ route('admin.dashboard') }}">
                            <i class="bi bi-house-door" style="color: #C6A56D;"></i>
                            <span class="nav-text" x-show="isExpanded" style="color: #C6A56D;">Home</span>
                        </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="nav-link {{ Request::is('admin/manage_pet') ? 'active' : '' }}" 
                        href="{{ route('admin.pages.manage_pet') }}"> 
                            <i class="bi bi-heart" style="color: #C6A56D;"></i>
                            <span class="nav-text" x-show="isExpanded" style="color: #C6A56D;">Manage Pets</span>
                        </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="nav-link {{ Request::is('admin/notification') ? 'active' : '' }}" 
                        href="{{ route('admin.pages.notification') }}"> 
                            <i class="bi bi-bell" style="color: #C6A56D;"></i>
                            <span class="nav-text" x-show="isExpanded" style="color: #C6A56D;">Notifications</span>
                        </a>
                    </li>
                    <li class="nav-item mb-3">
                        <a class="nav-link {{ Request::is('admin/report') ? 'active' : '' }}" 
                        href="{{ route('admin.pages.report') }}">
                            <i class="bi bi-file-earmark-bar-graph" style="color: #C6A56D;"></i>
                            <span class="nav-text" x-show="isExpanded" style="color: #C6A56D;">Reports</span>
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
                            <h3 class="text-center mb-4 fw-bold" style="color: #C6A56D;">ADMIN Dashboard Overview</h3>
                            <!-- Content will be added later -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection