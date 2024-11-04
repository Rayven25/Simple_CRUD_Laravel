@extends('layouts.app')

@section('content')
<div class="container py-4">
    <!-- Page Header with Shadow -->
    <div class="bg-white rounded shadow-sm p-4 mb-4">
        <h1 class="text-center mb-0">Edit Student</h1>
        <p class="text-center text-muted mt-2 mb-0">Update student information</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-user-edit text-primary me-2"></i>
                        <h5 class="card-title mb-0">Student Details</h5>
                    </div>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('students.update', $student->id) }}" method="POST" onsubmit="confirmSubmit(event, this, 'edit')">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="name" class="form-label">Full Name</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-user"></i>
                                </span>
                                <input type="text" 
                                       class="form-control" 
                                       id="name" 
                                       name="name" 
                                       value="{{ $student->name }}" 
                                       required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="form-label">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email" 
                                       class="form-control" 
                                       id="email" 
                                       name="email" 
                                       value="{{ $student->email }}" 
                                       required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="age" class="form-label">Age</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-birthday-cake"></i>
                                </span>
                                <input type="number" 
                                       class="form-control" 
                                       id="age" 
                                       name="age" 
                                       value="{{ $student->age }}" 
                                       required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="address" class="form-label">Address</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light">
                                    <i class="fas fa-map-marker-alt"></i>
                                </span>
                                <textarea class="form-control" 
                                          id="address" 
                                          name="address" 
                                          rows="3" 
                                          required>{{ $student->address }}</textarea>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-save me-2"></i>Save Changes
                            </button>
                            <a href="{{ route('students.index') }}" class="btn btn-outline-secondary px-4">
                                <i class="fas fa-times me-2"></i>Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
