<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Student Management')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <style>
        /* Navbar Styles */
        .navbar {
            background: linear-gradient(135deg, #4a90e2 0%, #2c3e50 100%);
            padding: 1rem 0;
        }
        .navbar-brand {
            font-weight: 600;
            letter-spacing: 1px;
            font-size: 1.25rem;
        }
        .navbar-brand i {
            font-size: 1.5rem;
        }
        
        /* Enhanced Dropdown Styles */
        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
            padding: 0.5rem;
        }
        
        .dropdown-item {
            padding: 0.75rem 1rem;
            border-radius: 0.375rem;
            transition: all 0.2s ease;
        }
        
        .dropdown-item:hover {
            background-color: rgba(74, 144, 226, 0.1);
            transform: translateX(5px);
        }
        
        /* Enhanced Mobile Styles */
        @media (max-width: 991.98px) {
            .navbar-collapse {
                background: rgba(44, 62, 80, 0.95);
                backdrop-filter: blur(10px);
                border-radius: 0.75rem;
                padding: 1rem;
                margin-top: 1rem;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            
            .dropdown-menu {
                background: rgba(255, 255, 255, 0.05);
                border: 1px solid rgba(255, 255, 255, 0.1);
                margin-top: 0.5rem;
            }
            
            .dropdown-item {
                color: white;
            }
            
            .dropdown-item:hover {
                background-color: rgba(255, 255, 255, 0.1);
                color: white;
            }
            
            .dropdown-divider {
                border-color: rgba(255, 255, 255, 0.1);
            }
        }
        
        /* Content and Footer */
        .content-wrapper {
            min-height: calc(100vh - 160px);
            padding: 2rem 0;
        }
        .footer {
            background: linear-gradient(135deg, #2c3e50 0%, #4a90e2 100%);
            color: white;
            padding: 1rem 0;
        }
        
        @media (max-width: 767.98px) {
            .navbar-brand {
                font-size: 1.1rem;
            }
            .content-wrapper {
                padding: 1rem 0;
            }
        }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm sticky-top">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand d-flex align-items-center" href="{{ route('students.index') }}">
                <i class="fas fa-graduation-cap me-2"></i>
                <span>Student Management</span>
            </a>

            <!-- Toggle Button -->
            <button class="navbar-toggler border-0 px-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Desktop Dropdown (visible on lg screens and up) -->
                    <li class="nav-item dropdown d-none d-lg-block">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-plus-circle me-1"></i> Actions
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end animate slideIn" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('students.create') }}">
                                    <i class="fas fa-user-plus me-2"></i> Add Student
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('students.index') }}">
                                    <i class="fas fa-list me-2"></i> View All Students
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <!-- Mobile Direct Links (visible on screens smaller than lg) -->
                    <li class="nav-item d-lg-none">
                        <a class="nav-link" href="{{ route('students.create') }}">
                            <i class="fas fa-user-plus me-2"></i> Add Student
                        </a>
                    </li>
                    <li class="nav-item d-lg-none">
                        <a class="nav-link" href="{{ route('students.index') }}">
                            <i class="fas fa-list me-2"></i> View All Students
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content-wrapper py-4">
        @yield('content')
    </div>

    <footer class="footer text-center">
        <div class="container">
            <small>© {{ date('Y') }} Boreng. All rights reserved.</small>
        </div>
    </footer>

    <script>
        // Show SweetAlert2 notifications for success messages
        @if(session()->has('swal'))
            Swal.fire({
                title: "{{ session('swal')['title'] }}",
                text: "{{ session('swal')['message'] }}",
                icon: "{{ session('swal')['icon'] }}",
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false,
                toast: true,
                position: 'top-end'
            });
        @endif

        // Enhanced delete confirmation
        function confirmDelete(event, formId) {
            event.preventDefault();
            const form = document.getElementById(formId);
            
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }

        // Form submission confirmations
        function confirmSubmit(event, form, action) {
            event.preventDefault();
            
            let config = {
                showCancelButton: true,
                cancelButtonColor: '#6c757d',
                showConfirmButton: true,
                allowOutsideClick: false,
                buttonsStyling: true,
                reverseButtons: true
            };
            
            switch(action) {
                case 'add':
                    config = {
                        ...config,
                        title: 'Add New Student',
                        text: 'Are you sure you want to add this student?',
                        icon: 'question',
                        confirmButtonColor: '#198754',
                        confirmButtonText: 'Yes, add student'
                    };
                    break;
                    
                case 'edit':
                    config = {
                        ...config,
                        title: 'Update Student',
                        text: 'Save changes to this student?',
                        icon: 'question',
                        confirmButtonColor: '#ffc107',
                        confirmButtonText: 'Yes, update student'
                    };
                    break;
                    
                case 'delete':
                    config = {
                        ...config,
                        title: 'Delete Student',
                        text: 'This action cannot be undone!',
                        icon: 'warning',
                        confirmButtonColor: '#dc3545',
                        confirmButtonText: 'Yes, delete student'
                    };
                    break;
            }
            
            Swal.fire(config).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }

        // Replace the existing confirmDelete function
        function confirmDelete(event, formId) {
            event.preventDefault();
            const form = document.getElementById(formId);
            confirmSubmit(event, form, 'delete');
        }
    </script>
</body>
</html>
