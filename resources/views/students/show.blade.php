@extends('layouts.app')

@section('content')
<div class="container py-4">
    <!-- Page Header -->
    <div class="bg-white rounded shadow-sm p-4 mb-4">
        <h1 class="text-center mb-0">Student Details</h1>
        <p class="text-center text-muted mt-2 mb-0">View student information</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-user-circle text-primary me-2"></i>
                            <h5 class="card-title mb-0">{{ $student->name }}</h5>
                        </div>
                        <div>
                            <a href="{{ route('students.edit', $student->id) }}" 
                               class="btn btn-warning btn-sm me-2">
                                <i class="fas fa-edit me-2"></i>Edit
                            </a>
                            <a href="{{ route('students.index') }}" 
                               class="btn btn-secondary btn-sm">
                                <i class="fas fa-arrow-left me-2"></i>Back
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <!-- Student Avatar -->
                        <div class="col-md-4 text-center mb-4 mb-md-0">
                            <div class="avatar-circle mx-auto mb-3" style="width: 120px; height: 120px; font-size: 2.5rem;">
                                {{ strtoupper(substr($student->name, 0, 2)) }}
                            </div>
                        </div>
                        
                        <!-- Student Information -->
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h6 class="text-muted mb-2">Full Name</h6>
                                <p class="fs-5">{{ $student->name }}</p>
                            </div>
                            
                            <div class="mb-4">
                                <h6 class="text-muted mb-2">Email Address</h6>
                                <p class="fs-5">
                                    <i class="fas fa-envelope me-2 text-primary"></i>
                                    {{ $student->email }}
                                </p>
                            </div>
                            
                            <div class="mb-4">
                                <h6 class="text-muted mb-2">Age</h6>
                                <p class="fs-5">
                                    <i class="fas fa-birthday-cake me-2 text-primary"></i>
                                    {{ $student->age }} years old
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 