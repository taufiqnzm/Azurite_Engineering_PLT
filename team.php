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
        .frame {
            border: 2px solid #3b5bdb;
            /* Example border color */
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            /* Example shadow effect */
            overflow: hidden;
            /* Ensures the border and shadow don't overflow */
        }

        .frame img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 8px;
            /* Rounded corners for the image inside the frame */
        }

        .main-container {
            text-align: center;
            /* background: #f5f5f5; */
        }

        /* .header {
            padding-top: 30px;
            color: #444;
            font-size: 20px;
            margin: auto;
            line-height: 50px;
        } */

        .sub-container {
            max-width: 1200px;
            margin: auto;
            padding: 30px 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .sub-container .teams {
            background-color: #f8f9fa;
            /* Light background color */
            border: 1px solid #ddd;
            border-radius: 12px;
            padding: 22px;
            margin: 10px;
            max-width: 30%;
            cursor: pointer;
            transition: 0.4s;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Subtle shadow effect */
        }


        .sub-container .teams:hover {
            background-color: #dee2e6;
            /* Hover effect */
            border-color: #ccc;
            transform: scale(1.05);
            /* Scale up on hover */
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }


        .teams {
            margin: 10px;
            padding: 22px;
            max-width: 30%;
            cursor: pointer;
            transition: 0.4s;
            box-sizing: border-box;
        }

        .team-container {
            display: flex;
            flex-wrap: wrap;
            /* Allow wrapping to the next row */
            gap: 16px;
        }

        .teams:hover {
            background: #ddd;
            border-radius: 12px;
        }

        .teams img {
            width: 200px;
            height: 200px;
        }

        .name {
            padding: 12px;
            font-weight: bold;
            font-size: 16px;
            text-transform: uppercase;
        }

        .desig {
            font-style: italic;
            color: #888;
        }

        .about {
            margin: 20px 0;
            font-weight: lighter;
            color: #4e4e4e;
        }

        .social-links a {
            display: inline-block;
            height: 30px;
            width: 30px;
            transition: .4s;
        }

        .social-links a:hover {
            transform: scale(1.5);
        }

        .social-links a i {
            color: #444;
        }

        @media screen and (max-width: 600px) {
            .teams {
                max-width: 90%;
                /* Adjust the width of the container */
                margin: 10px auto;
                /* Center the cards on smaller screens */
            }

            .teams img {
                max-width: 100%;
                /* Ensure images don't exceed the container's width */
                height: auto;
                /* Maintain aspect ratio */
                object-fit: cover;
                /* Ensures proper image display */
                border-radius: 8px;
                /* Keep consistent styling */
            }

            .name,
            .desig,
            .about {
                text-align: center;
                /* Center-align text for better layout on mobile */
            }

            .social-links {
                justify-content: center;
                /* Center-align the social links */
                display: flex;
                flex-wrap: wrap;
                gap: 10px;
                /* Add spacing between icons */
            }
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
                        <a href="team.php" class="dropdown-item active">Our Team</a>
                        <a href="gallery.php" class="dropdown-item">Gallery</a>
                        <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                        <a href="cert.php" class="dropdown-item">Certificates</a>
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
            <h1 class="display-3 text-white mb-3 animated slideInDown">Our Team</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Our Team</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Team Start -->
    <div class="main-container">
        <!-- <div class="header">
            <h1>Our Team</h1>
        </div> -->
        <div class="section-title text-center">
            <h1 class="display-5 mb-5">Our Team</h1>
        </div>
        <div class="sub-container">
            <div class="teams">
                <img src="img/team/pokcik.png" alt="">
                <div class="name">Dr. Muhammad Nur Hidayat Bin Zahari</div>
                <div class="desig">Managing Director</div>
                <div class="about">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>

                <div class="social-links">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-github"></i></a>
                </div>
            </div>

            <div class="teams">
                <img src="img/team/alisha.png" alt="">
                <div class="name">Pn. Alisha Binti Saiful Azhar</div>
                <div class="desig">Director</div>
                <div class="about">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>

                <div class="social-links">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-github"></i></a>
                </div>
            </div>

            <div class="teams">
                <img src="img/team/admin.png" alt="">
                <div class="name">Pn. Siti Nurbalqis Binti Mohd Zainudin</div>
                <div class="desig">Finance/Admin</div>
                <div class="about">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>

                <div class="social-links">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-github"></i></a>
                </div>
            </div>

            <div class="teams">
                <img src="img/team/naqib.png" alt="">
                <div class="name">En. Muhammad Naqib Bin Domadzi</div>
                <div class="desig">Site Supervisor</div>
                <div class="about">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>

                <div class="social-links">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-github"></i></a>
                </div>
            </div>

            <div class="teams">
                <img src="img/team/amir.png" alt="">
                <div class="name">En. Amiruddin Bin Azmi</div>
                <div class="desig">Driller</div>
                <div class="about">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>

                <div class="social-links">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-github"></i></a>
                </div>
            </div>
        </div>

    </div>
    <!-- Team End -->




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

    <script src="https://kit.fontawesome.com/cb89145f02.js" crossorigin="anonymous"></script>
</body>

</html>