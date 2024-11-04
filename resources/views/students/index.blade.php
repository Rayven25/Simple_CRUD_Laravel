@extends('layouts.app')

@section('content')
<style>
    .avatar-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        background: linear-gradient(135deg, #4a90e2 0%, #2c3e50 100%);
    }
    .table th {
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
    }
    .btn-outline-warning:hover,
    .btn-outline-danger:hover {
        color: white;
    }
    .empty-state {
        padding: 3rem;
        text-align: center;
    }
    .empty-state i {
        font-size: 3rem;
        color: #ccc;
        margin-bottom: 1rem;
    }
</style>

<div class="container py-4">
    <!-- Page Header with Shadow -->
    <div class="bg-white rounded shadow-sm p-4 mb-4">
        <h1 class="text-center mb-0">Student Management System</h1>
        <p class="text-center text-muted mt-2 mb-0">Manage your students efficiently</p>
    </div>
    
    <!-- Student List Card -->
    <div class="card shadow-sm">
        <div class="card-header bg-white py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">
                    <i class="fas fa-users me-2 text-primary"></i>
                    Student List
                </h5>
                <span class="badge bg-primary">Total: {{ $students->count() }}</span>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="px-4 py-3 text-dark">Name</th>
                            <th class="px-4 py-3 text-dark">Email</th>
                            <th class="px-4 py-3 text-dark">Age</th>
                            <th class="px-4 py-3 text-dark">Address</th>
                            <th class="px-4 py-3 text-dark" width="200">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $student)
                            <tr>
                                <td class="px-4 py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-circle bg-primary text-white me-3">
                                            {{ strtoupper(substr($student->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <h6 class="mb-0">{{ $student->name }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="text-muted">
                                        <i class="fas fa-envelope me-2"></i>
                                        {{ $student->email }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="badge bg-light text-dark">
                                        {{ $student->age }} years
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <span class="text-muted">
                                        <i class="fas fa-map-marker-alt me-2"></i>
                                        {{ $student->address }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('students.edit', $student->id) }}" 
                                           class="btn btn-warning btn-sm px-3">
                                            <i class="fas fa-edit me-2"></i>Edit
                                        </a>
                                        <form id="delete-form-{{ $student->id }}" 
                                              action="{{ route('students.destroy', $student->id) }}" 
                                              method="POST" 
                                              class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" 
                                                    class="btn btn-danger btn-sm px-3" 
                                                    onclick="confirmDelete(event, 'delete-form-{{ $student->id }}')">
                                                <i class="fas fa-trash me-2"></i>Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No students found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection