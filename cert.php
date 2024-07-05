<?php
    require_once("includes/config.php");
    session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>AZURITE ENGINEERING PLT</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/azurite-logo.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>
        .card {
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            position: relative; /* Ensure relative positioning for absolute children */
        }

        .card-img-top {
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            height: auto;
            width: 100%;
            object-fit: cover; /* Ensures the image covers the entire space */
        }

        .card-body {
            padding: 20px; /* Adjust padding as needed */
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.8); /* Adjust opacity as needed */
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
        }

        .card:hover .card-body {
            opacity: 1;
        }

        .card-title {
            font-size: 1.25rem; /* Adjust font size for the title */
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px; /* Adjust margin as needed */
        }

        .card-text {
            font-size: 1rem; /* Adjust font size for the description */
            text-align: center;
            margin-bottom: 20px; /* Adjust margin as needed */
        }

        .btn-download {
            display: flex;
            justify-content: center;
            align-items: center;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            transition: background-color 0.3s ease;
        }

        .btn-download:hover {
            background-color: #0056b3;
        }

        .btn-download i {
            margin-right: 5px; /* Adjust margin as needed */
        }
    </style>


</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar -->
    <?php include 'includes/topbar.php'; ?>


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img src="img/azurite-logo.png" alt="AZURITE ENGINEERING PLT Logo" class="img-fluid me-2" style="height: 50px;">
            <!-- <h3 class="m-0 text-primary">AZURITE ENGINEERING PLT</h3> -->
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link">Home</a>
                <a href="about.php" class="nav-item nav-link">About</a>
                <a href="service.php" class="nav-item nav-link">Service</a>
                <a href="project.php" class="nav-item nav-link">Project</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-up m-0">
                        <!-- <a href="feature.php" class="dropdown-item">Feature</a>
                        <a href="quote.php" class="dropdown-item">Free Quote</a> -->
                        <a href="team.php" class="dropdown-item">Our Team</a>
                        <a href="gallery.php" class="dropdown-item">Gallery</a>
                        <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                        <a href="cert.php" class="dropdown-item active">Certificates</a>
                    </div>
                </div>
                <a href="contact.php" class="nav-item nav-link">Contact</a>
            </div>
            <a href="quote.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Get A Quote<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Certificates & Registration</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Certificates & Registration</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- License Section Start -->
    <section class="container py-5">
        <div class="section-title text-center">
            <h1 class="display-5 mb-5">Certificates & Registration </h1>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <!-- License Item -->
            <div class="col">
                <div class="card h-100">
                    <img src="img/license/registration.jpg" class="card-img-top" alt="License Preview">
                    <div class="card-body">
                        <a href="img/license/registration.pdf" class="btn btn-primary btn-download" download><i class="bi bi-download"></i></a>
                    </div>
                    <div class="card-label">
                        <h5 class="card-title">Company Registration</h5>
                        <p class="card-text">Registration No.: 201904002936 (LLP0021748-LGN)</p>
                    </div>
                </div>                
            </div>     
            <div class="col">
                <div class="card h-100">
                    <img src="img/license/cidb.jpg" class="card-img-top" alt="License Preview">
                    <div class="card-body">
                        <a href="img/license/cidb.pdf" class="btn btn-primary btn-download" download><i class="bi bi-download"></i></a>                        
                    </div>
                    <div class="card-label">
                        <h5 class="card-title">Construction Industry Development (CIDB)</h5>
                        <p class="card-text">Registration No: 0120200116-JH040538</p>
                    </div>
                </div>
            </div> 
            <div class="col">
                <div class="card h-100">
                    <img src="img/license/cidb-2.jpg" class="card-img-top" alt="License Preview">
                    <div class="card-body">
                        <a href="img/license/cidb-2.pdf" class="btn btn-primary btn-download" download><i class="bi bi-download"></i></a>                        
                    </div>
                    <div class="card-label">
                        <h5 class="card-title">Construction Industry Development (CIDB)</h5>
                        <p class="card-text">Grade G1 Gategory:
                        B04, B05, CE01, CE10, CE12, CE21, CE36, M15.</p>
                    </div>
                </div>
            </div> 
            <div class="col">
                <div class="card h-100">
                    <img src="img/license/jccd.jpg" class="card-img-top" alt="License Preview">
                    <div class="card-body">
                        <a href="img/license/jccd.pdf" class="btn btn-primary btn-download" download><i class="bi bi-download"></i></a>                        
                    </div>
                    <div class="card-label">
                        <h5 class="card-title">Johor Centre for Construction Development (JCCD)</h5>
                        <p class="card-text">Registration No.: JCCD/SKJ/20/01/00807</p>
                    </div>
                </div>
            </div> 
            <div class="col">
                <div class="card h-100">
                    <img src="img/license/kkm.jpg" class="card-img-top" alt="License Preview">
                    <div class="card-body">
                        <a href="img/license/kkm.pdf" class="btn btn-primary btn-download" download><i class="bi bi-download"></i></a>
                        
                    </div>
                    <div class="card-label">
                        <h5 class="card-title">Construction Industry Development (CIDB)</h5>
                        <p class="card-text">No. Sijil: K10103794203191171<br>
                            No. Rujukan Pendaftaran: 357-0002345534</p>
                    </div>
                </div>
            </div> 
            <div class="col">
                <div class="card h-100">
                    <img src="img/license/service.jpg" class="card-img-top" alt="License Preview">
                    <div class="card-body">
                        <a href="img/license/service.pdf" class="btn btn-primary btn-download" download><i class="bi bi-download"></i></a>
                        
                    </div>
                    <div class="card-label">
                        <h5 class="card-title">Construction Industry Development (CIDB)</h5>
                        <p class="card-text">Gred Pendaftaran: G1 / Kelas F <br>
                        Kategori: B, CE, ME</p>
                    </div>
                </div>
            </div>        
        </div>        
    </section>
    <!-- License Section End -->
        

    <!-- Footer -->
    <?php include 'includes/footer.php' ?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>