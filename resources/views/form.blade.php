<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stepper Bootstrap 5</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">

    <style>
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 48px 0 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        }
        .sidebar-sticky {
            position: relative;
            top: 0;
            height: calc(100vh - 48px);
            padding-top: .5rem;
            overflow-x: hidden;
            overflow-y: auto;
        }
        .form-range::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 25px;
            height: 25px;
            border-radius: 50%; 
            background: #0d6efd;
            cursor: pointer;
        }
        .form-range::-moz-range-thumb {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: #0d6efd;
            cursor: pointer;
        }
        .bs-stepper-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
            border-bottom: 2px solid #ddd;
        }
        .step {
            text-align: center;
            flex-grow: 1;
        }
        .step-trigger {
            border: none;
            background: transparent;
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
            color: #aaa;
        }
        .bs-stepper-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: inline-block;
            font-size: 18px;
            font-weight: bold;
            border: 2px solid #aaa;
            background-color: white;
            color: #aaa;
        }
        .active .bs-stepper-circle {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }
        .active .bs-stepper-label {
            color: #007bff;
            font-weight: bold;
        }
        .bs-stepper-label {
            font-size: 14px;
            margin-top: 5px;
            color: #aaa;
        }
        .line {
            flex-grow: 1;
            height: 2px;
            background-color: #ddd;
            margin: 0 10px;
        }
        .bs-stepper-content {
            padding: 20px;
        }
        .content {
            display: none;
        }
        .content.active {
            display: block;
            animation: fadeIn 0.5s;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>
<div class="container md-3">
        <div class="row">
            <!-- Sidebar https://jagooit.com/assets/img/logo.png -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <img src="https://jagooit.com/assets/img/logo.png" style="width:120px;length:240px;">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <i class="bi bi-house-door"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-file-earmark"></i> Forms
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-people"></i> Users
                            </a>
                        </li>
                        <!-- Add more sidebar items as needed -->
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="mt-3">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Forms</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@yield('breadcrumb', 'Current Page')</li>
                    </ol>
                </nav>

        <div class="bs-stepper">
            <div class="bs-stepper-header" role="tablist">
                <!-- Step 1 -->
                <div class="step active" data-target="#logins-part">
                    <button type="button" class="step-trigger" role="tab">
                        <span class="bs-stepper-circle">1</span>
                        <span class="bs-stepper-label">Details</span>
                    </button>
                </div>
                <div class="line"></div>
                <!-- Step 2 -->
                <div class="step" data-target="#information-part">
                    <button type="button" class="step-trigger" role="tab">
                        <span class="bs-stepper-circle">2</span>
                        <span class="bs-stepper-label">Justifications</span>
                    </button>
                </div>
            </div>
            <form id="improvedForm" class="needs-validation" novalidate method="post" action="/perfegement" enctype="multipart/form-data">
                <div class="bs-stepper-content">
                    @csrf
                    <!-- Step 1 Content -->
                    <div id="logins-part" class="content active" role="tabpanel">
                        <div class="mb-3">
                            <label for="datepicker" class="form-label">Date</label>
                            <input type="date" class="form-control" id="datepicker" name="date" style="max-width:200px" required>
                        </div>
                        <div class="mb-3">
                            <label for="status_hadir" class="form-label">Status</label>
                            <select class="form-select" id="status_hadir" name="status_hadir" style="max-width:200px" required>
                                <option value="" selected disabled>Status Kehadiran</option>
                                <option value="hadir">Hadir</option>
                                <option value="izin">Izin</option>
                                <option value="sakit">Sakit</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jenis" class="form-label">Jenis Hari</label>
                            <select class="form-select" id="jenis" name="jenis" style="max-width:200px" required>
                                <option value="" selected disabled>Jenis Hari</option>
                                <option value="biasa">Biasa</option>
                                <option value="libur">Libur</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jam_datang" class="form-label">Jam Datang</label>
                            <input type="time" class="form-control" id="jam_datang" name="jam_datang" value="07:00" style="max-width:100px" required>
                        </div>
                        <div class="mb-3">
                            <label for="jam_pulang" class="form-label">Jam Pulang</label>
                            <input type="time" class="form-control" id="jam_pulang" name="jam_pulang" value="07:00" style="max-width:100px" required>
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-primary float-end" onclick="goToStep(2)">Next</button>
                        </div>
                    </div>

                    <!-- Step 2 Content -->
                    <div id="information-part" class="content" role="tabpanel">
                        <div class="mb-3">
                            <label for="j_approval" class="form-label">Approval Justification</label>
                            <input type="file" class="form-control" id="j_approval" name="j_approval" accept=".pdf,.docx" style="max-width:250px" required>
                        </div>
                        <div class="mb-3">
                            <label for="j_agenda" class="form-label">Agenda Justification</label>
                            <input type="file" class="form-control" id="j_agenda" name="j_agenda" accept=".pdf,.docx" style="max-width:250px" required>
                        </div>
                        <div class="mb-3">
                            <button type="button" class="btn btn-secondary" onclick="goToStep(1)">Previous</button>
                            <button type="submit" class="btn btn-success float-end">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
    </div>
            </main>
        </div>
    </div>
    

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function goToStep(step) {
            // Remove active class from all steps and content
            document.querySelectorAll('.step, .content').forEach(el => el.classList.remove('active'));

            // Add active class to the current step and content
            document.querySelectorAll('.step')[step - 1].classList.add('active');
            document.querySelectorAll('.content')[step - 1].classList.add('active');
        }

        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('improvedForm');
        flatpickr("#datepicker", {
            dateFormat: "Y-m-d",
        });
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                } else {
                    event.preventDefault(); // Prevent default form submission

                    Swal.fire({
                        title: "Are you sure?",
                        text: "You are about to submit the form.",
                        icon: "question",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, submit it!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // Submit the form
                            Swal.fire({
                                title: "Submitted!",
                                text: "Your form has been submitted.",
                                icon: "success"
                            });
                        }
                    });
                }
                form.classList.add('was-validated');
            });
        });
    </script>
</body>
</html>