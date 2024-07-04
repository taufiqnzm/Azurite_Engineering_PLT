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
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>
        .gallery-section .row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
        }
        .gallery-section .column {
            grid-column: span 3 ;
            width: auto;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
        }
        .container-xxl {
            padding-left: 50px;
            padding-right: 50px;
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
    <?php include 'includes/topbar.php' ?>


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img src="img/azurite-logo.png" alt="AZURITE ENGINEERING PLT Logo" class="img-fluid me-2" style="height: 50px;">
            <h3 class="m-0 text-primary">AZURITE ENGINEERING PLT</h3>
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
                        <a href="gallery.php" class="dropdown-item active">Gallery</a>
                        <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                        <!-- <a href="404.php" class="dropdown-item">404 Page</a> -->
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
            <h1 class="display-3 text-white mb-3 animated slideInDown">Gallery</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Gallery</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Gallery Start -->
    <div class="container-xxl px-2 mt-5 gallery-section">
        <!-- <div class="heading py-4 border-bottom border-light">
            <h1 class="text-white text-center">Gallery</h1>
            <h5 class="text-light py-2 text-center">Projects Pictures</h5>
        </div> -->
        <div class="section-title text-center">
            <h1 class="display-5 mb-5">Gallery</h1>
        </div>

        <div class="row py-2" id="gallery">
            <!-- JavaScript will inject the columns here -->
        </div>
    </div>
    <!-- Gallery End -->

        
    <!-- Footer Start -->
    <?php  include 'includes/footer.php' ?>


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

    <script>
        const basePath = 'img/gallery/';
        const baseName = 'img-';
        const fileExtension = '.jpg';
        let imageCount = 94; // Number of images in the gallery directory

        // Ensure imageCount is divisible by 24
        imageCount = Math.floor(imageCount / 24) * 24;

        const images = [];

        // Generate image paths based on the pattern
        for (let i = 1; i <= imageCount; i++) {
            images.push(`${basePath}${baseName}${i}${fileExtension}`);
        }

        // Additional images from another directory
        const additionalImages = [
            'img/services/service-vaneshear.jpg', 'img/services/service-terrain.jpg', 'img/services/service-seismic.jpg',
            'img/services/service-pit.jpg', 'img/services/service-piezometer.jpg', 'img/services/service-mackintosh.jpg',
            'img/services/service-inclonometer.jpg', 'img/services/service-g-sampling.jpg', 'img/services/service-geo-mapping.jpg',
            'img/services/service-ert.jpg', 'img/services/service-drill.jpg', 'img/services/service-auger.jpg',
        ];

        images.push(...additionalImages);

        const gallery = document.getElementById('gallery');

        // Create columns based on image array
        const columns = [[], [], [], []];
        images.forEach((src, index) => {
            columns[index % 4].push(`<img src="${src}" alt="" srcset="">`);
        });

        // Insert columns into gallery
        columns.forEach(column => {
            const div = document.createElement('div');
            div.className = 'column';
            div.innerHTML = column.join('');
            gallery.appendChild(div);
        });

    </script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>