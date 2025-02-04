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
        @import url('https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap');
        @import url('https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css');

        .footer-container {
            background-color: #dddddd;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 15px 0;
            margin-top: 40px;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
            background-color: rgba(255, 255, 255, 0.1);
            z-index: 1000;
        }

        .footer-content {
            text-align: center;
            color: #333;
            font-size: 0.9rem;
            margin: 0;
            padding: 0 15px;
        }

        main {
            padding-bottom: 70px;
        }

        body {
            display: flex;
            background-color: #f4f3f3;
           
        }

        aside {
            background-color: #dddddd;
            color: black;
            width: 240px;
            height: 100vh;
            display: flex;
            flex-direction: column;
            padding: 1.5rem 1rem;
            transition: all 0.3s ease;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
        }

        aside.mini {
            width: 80px;
            padding: 1.5rem 0.5rem;
        }

        aside button {
            background-color: transparent;
            border: none;
            height: 48px;
            width: 60px;
            font-size: 1.25rem;
            color: black;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.5rem;
            margin-bottom: 0;
            align-self: flex-start;
        }

        aside .link {
            flex: 1;
        }

        aside ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        aside ul li {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            cursor: pointer;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
        }

        aside ul li i {
            width: 24px;
            height: 24px;
            font-size: 1.25rem;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 1rem;
        }

        aside ul li label {
            margin: 0;
            font-size: 1rem;
            white-space: nowrap;
            cursor: inherit;
        }

        aside.mini ul li {
            padding: 0.75rem;
            justify-content: center;
        }

        aside.mini ul li i {
            margin-right: 0;
        }

        aside.mini ul li label {
            display: none;
        }

        aside ul li.active,
        aside ul li:hover {
            background-color: #ff7700;
            color: #000;
        }

        /* Main content adjustment */
        .main-wrapper {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        main {
            margin-left: 240px;
            width: calc(100% - 240px);
            transition: all 0.3s ease;
            padding: 1.5rem;
            max-width: 1200px;
        }

        aside.mini + .main-wrapper main {
            margin-left: 80px;
            width: calc(100% - 80px);
        }

        .page-title {
            color: #2B2B2B;
            font-weight: bold;
            margin-bottom: 0;
            text-align: center;
        }
        
        .page-subtitle {
            color: #6C757D;
            font-size: 1rem;
            margin-bottom: 2rem;
            text-align: center;
        }

        .form-control, .form-select {
            border: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .bs-stepper {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 50px;
            margin-bottom: 20px;
        }

        .bs-stepper-header {
            max-width: 600px;
            margin: 0 auto;
            position: relative;
            padding: 20px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }

        .step {
            flex: 0 1 auto;
            width: 250px;
        }

        .bs-stepper-header::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80px;
            height: 2px;
            background-color: #dee2e6;
            z-index: 1;
        }

        .step-trigger {
            display: flex;
            align-items: center;
            padding: 0;
            border: none;
            background: none;
            width: 100%;
            text-decoration: none;
        }

        .step-status {
            background-color: #fff;
            border-radius: 50px;
            padding: 8px 20px;
            width: auto;
            min-width: 200px;
            position: relative;
            z-index: 2;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
        }

        .bs-stepper-circle {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background-color: #dee2e6;
            margin-right: 12px;
            flex-shrink: 0;
        }

        .step.active .bs-stepper-circle {
            background-color: #ee5656;
            color: white;
        }

        .bs-stepper-label {
            margin: 0;
            font-weight: 500;
            color: #6c757d;
        }

        .step.active .bs-stepper-label {
            color: black;
        }

        .btn-with-circle {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 20px;
            border: none;
            background: none;
            font-weight: 500;
            color: #495057;
        }

        /* Menghilangkan efek hover */
        .btn-with-circle:hover {
            background-color: transparent;
            color: #495057;
        }

        .circle-icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background-color: black;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        /* Memastikan circle icon tidak berubah saat hover */
        .btn-primary.btn-with-circle:hover,
        .btn-secondary.btn-with-circle:hover {
            background-color: transparent;
        }

        .btn-primary.btn-with-circle:hover .circle-icon,
        .btn-secondary.btn-with-circle:hover .circle-icon {
            background-color: black;
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

        .nav-link {
            border-radius: 4px;
            margin: 5px 0;
            transition: all 0.3s ease;
            color: #000 !important;
            font-weight: bold;
        }

        .nav-link.active {
            background-color: rgba(0, 0, 0, 0.1);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }
        .logo-img {
            width: 120px;
            height: auto;
            display: none; /* Hidden by default */
            margin-left: 10px;
            transition: all 0.3s ease;
            opacity: 0;
        }

        aside:not(.mini) .logo-img {
            display: block; /* Show when sidebar is open */
            opacity: 1;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <aside>
        <div style="display: flex; align-items: center; margin-bottom: 2rem;">
            <button id="toggle">
                <i class="fi fi-rr-list"></i>
            </button>
            <img src="https://jagooit.com/assets/img/logo.png" alt="Jago Logo" class="logo-img">
        </div>
        <div class="link">
            <ul>
                <li class="active">
                    <i class="fi fi-rr-home"></i>
                    <label>Dashboard</label>
                </li>
                <li>
                    <i class="fi fi-rr-document"></i>
                    <label>Form</label>
                </li>
                <li>
                    <i class="fi fi-rr-users"></i>
                    <label>Users</label>
                </li>
            </ul>
        </div>
    </aside>

    <!-- Main content wrapper -->
    <div class="main-wrapper">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container mt-4">
                <div class="bs-stepper">
                    <h1 class="page-title">Add Performance Analyst</h1>
                    <p class="page-subtitle">Make your own performance report</p>
                    
                    <div class="bs-stepper-header" role="tablist">
                        <div class="step active" data-target="#job-details-part">
                            <div class="step-status">
                                <span class="bs-stepper-circle">
                                    <i class="bi bi-check-lg"></i>
                                </span>
                                <span class="bs-stepper-label">Job Details</span>
                            </div>
                        </div>
                        <div class="step" data-target="#justification-part">
                            <button type="button" class="step-trigger" role="tab">
                                <div class="step-status">
                                    <span class="bs-stepper-circle">
                                        <i class="bi bi-check-lg"></i>
                                    </span>
                                    <span class="bs-stepper-label">Justification</span>
                                </div>
                            </button>
                        </div>
                    </div>

                    <form id="improvedForm" class="needs-validation" novalidate method="post" action="/perfegement" enctype="multipart/form-data">
                        <div class="bs-stepper-content">
                            <!-- Job Details Step -->
                            <div id="job-details-part" class="content active" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="jenis" class="form-label">Jenis</label>
                                        <select class="form-select" id="jenis" name="jenis" required>
                                            <option value="" selected disabled></option>
                                            <option value="hadir">Hadir</option>
                                            <option value="sakit">Sakit</option>
                                            <option value="izin">Izin</option>
                                            <option value="sakit">Cuti</option>
                                            <option value="spj">SPJ</option>
                                            <option value="lembur">Lembur</option>
                                            <option value="weekly_report">Weekly Report</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tipe" class="form-label">Tipe</label>
                                        <select class="form-select" id="tipe" name="tipe" required>
                                            <option value="" selected disabled></option>
                                            <option value="kerja">Kerja</option>
                                            <option value="libur">Libur</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="datepicker" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" id="datepicker" name="date" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="durasi" class="form-label">Durasi</label>
                                        <input type="text" class="form-control" id="durasi" name="durasi" required>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                                </div>

                                <div class="mt-3">
                                    <button type="button" class="btn btn-primary btn-with-circle float-end" onclick="goToStep(2)">
                                        NEXT
                                        <span class="circle-icon">
                                            <i class="bi bi-arrow-right"></i>
                                        </span>
                                    </button>
                                </div>
                                </div>

                                <!-- Justification Step -->
                                <div id="justification-part" class="content" role="tabpanel">
                                    <div class="mb-3">
                                        <label for="j_approval" class="form-label">Approval & Agenda Justification</label>
                                        <input type="file" class="form-control" id="j_approval" name="j_approval" accept=".jpg,.png">
                                    </div>
                                    <div class="mt-3">
                                        <label for="note" class="form-label">Notes</label>
                                        <textarea class="form-control" id="note" name="note" rows="3" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <button type="button" class="btn btn-secondary btn-with-circle" onclick="goToStep(1)">
                                            <span class="circle-icon">
                                                <i class="bi bi-arrow-left"></i>
                                            </span>
                                            PREV
                                        </button>
                                        <button type="submit" class="btn btn-success float-end">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer-container">
        <div class="footer-content">
            © Copyright 2025 PT Jago Talenta Indonesia. All Rights Reserved
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        let sideBar = document.querySelector("aside");
        let toggle = document.querySelector("#toggle");
        toggle.addEventListener("click", function (e) {
            if (sideBar.classList.contains("mini")) {
                sideBar.classList.remove("mini");
            } else {
                sideBar.classList.add("mini");
            }
        });

        function goToStep(step) {
            document.querySelectorAll('.step, .content').forEach(el => el.classList.remove('active'));
            document.querySelectorAll('.step')[step - 1].classList.add('active');
            document.querySelectorAll('.content')[step - 1].classList.add('active');
        }

        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('improvedForm');
            flatpickr("#datepicker", {
                dateFormat: "Y-m-d",
            });

            function toggleRequiredFields() {
                const isWeeklyReport = $('#jenis').val() === 'weekly_report';
                $('#tipe, #durasi').prop('disabled', isWeeklyReport);
                if (isWeeklyReport) {
                    $('#tipe').val('');
                    $('#durasi').val('');
                    $('#j_approval').val('');
                }
            }

            function lemburr() {
                const isLembur = $('#durasi').val() > 8;
                $('#j_approval').prop('disabled', !isLembur);
                if (isLembur) {
                    $('#j_approval').val('');
                }
            }
            function sakit() {
            const isSakit = $('#jenis').val() === "sakit";
            $('#durasi').prop('disabled', isSakit);
        }
            // Call the function on page load and when jenis changes
            toggleRequiredFields();
            lemburr();
            sakit();
            $('#jenis').on('change', toggleRequiredFields);
            $('#durasi').on('change', lemburr);
            $('#jenis').on('change', sakit);
            
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                    Swal.fire({
                        text: "Your data is incorrect!",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Back",
                        customClass: {
                            confirmButton: "btn btn-secondary"
                        }
                    });
                } else {
                    event.preventDefault();

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
                            form.submit();
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
        <div class="footer-container">
            <div class="footer-content">
                © Copyright 2025 PT Jago Talenta Indonesia. All Rights Reserved
            </div>
        </div>
    </body>
    </html>
