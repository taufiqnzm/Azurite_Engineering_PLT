<?php
require_once("includes/config.php");
session_start();

// Pagination variables
$resultsPerPage = 10;

// Determine current page
if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

// Retrieve selected year from the dropdown
if (isset($_GET['year'])) {
    $selectedYear = $_GET['year'];
} else {
    $selectedYear = 'all'; // Default value to show all projects
}

// Calculate the starting point for the results
$startResult = ($page - 1) * $resultsPerPage;

// Retrieve total project count based on the selected year
if ($selectedYear === 'all') {
    $countSql = "SELECT COUNT(*) FROM tblProject";
    $stmtCount = $conn->prepare($countSql);
} else {
    $countSql = "SELECT COUNT(*) FROM tblProject WHERE projectYear = ?";
    $stmtCount = $conn->prepare($countSql);
    $stmtCount->bind_param("i", $selectedYear);
}

$stmtCount->execute();
$stmtCount->bind_result($totalProjects);
$stmtCount->fetch();
$stmtCount->close();

$totalPages = ceil($totalProjects / $resultsPerPage);

// Validate current page against total pages
if ($page > $totalPages) {
    // Redirect to the last page if current page exceeds total pages
    header("Location: project.php?page=$totalPages&year=$selectedYear");
    exit;
}

// Retrieve projects based on the selected year and pagination
if ($selectedYear === 'all') {
    $projectCardSql = "SELECT projectId, projectName, projectYear FROM tblProject ORDER BY projectYear DESC LIMIT ?, ?";
    $stmt = $conn->prepare($projectCardSql);
    $stmt->bind_param("ii", $startResult, $resultsPerPage);
} else {
    $projectCardSql = "SELECT projectId, projectName, projectYear FROM tblProject WHERE projectYear = ? ORDER BY projectYear DESC LIMIT ?, ?";
    $stmt = $conn->prepare($projectCardSql);
    $stmt->bind_param("iii", $selectedYear, $startResult, $resultsPerPage);
}

$stmt->execute();
$result = $stmt->get_result();

// Adjust displayed project range
if ($result->num_rows > 0) {
    $startProjectDisplayed = ($page - 1) * $resultsPerPage + 1;
    $endProjectDisplayed = min($startProjectDisplayed + $resultsPerPage - 1, $totalProjects);
} else {
    $startProjectDisplayed = 0;
    $endProjectDisplayed = 0;
}
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
            transition: transform 0.3s ease, opacity 0.5s ease;
            opacity: 0; /* Start with opacity 0 to fade in */
        }

        /* Alternate animation direction based on card index */
        .fadeInRight {
            animation: fadeInRightAnimation 2s forwards;
        }

        .fadeInLeft {
            animation: fadeInLeftAnimation 2s forwards;
        }

        @keyframes fadeInRightAnimation {
            0% {
                opacity: 0;
                transform: translateX(200px); /* Move from right */
            }
            100% {
                opacity: 1;
                transform: translateX(0); /* Fade in to original position */
            }
        }

        @keyframes fadeInLeftAnimation {
            0% {
                opacity: 0;
                transform: translateX(-200px); /* Move from left */
            }
            100% {
                opacity: 1;
                transform: translateX(0); /* Fade in to original position */
            }
        }

        .card-title {
            font-size: 1.25rem; /* Increase font size */
            color: #ffffff; /* White color */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); /* Add text shadow for contrast */
        }

        .card-text {
            font-size: 1rem;
            color: #ffffff;
        }

        .custom-card {
            background-color: var(--primary); /* Change background color */
            border-radius: 50px; /* High value for a cylindrical shape */
        }

        .custom-card:hover {
            background-color: #ea282a; /* Change to white on hover */
            color: #ab7442; /* Change text color to match original background */
            border-radius: 50px; /* Maintain cylindrical shape on hover */
        }

        .pagination-info {
            text-align: center;
            font-size: 1rem;
            color: #666;
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
                <a href="project.php" class="nav-item nav-link active">Project</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-up m-0">
                        <!-- <a href="feature.php" class="dropdown-item">Feature</a>
                        <a href="quote.php" class="dropdown-item">Free Quote</a> -->
                        <a href="team.php" class="dropdown-item">Our Team</a>
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
            <h1 class="display-3 text-white mb-3 animated slideInDown">Project</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Project</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Projects Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="section-title text-center">
            <h1 class="display-5 mb-5">Our Projects</h1>
        </div>

        <!-- Year Filter Start -->
        <div class="row mb-4">
            <div class="col-12 text-end">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="yearDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Filter by Year
                    </button>
                    <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="yearDropdown">
                        <li><a class="dropdown-item" href="?page=<?php echo $page; ?>">All Years</a></li>
                        <?php
                        $years = $conn->query("SELECT DISTINCT projectYear FROM tblProject ORDER BY projectYear DESC");
                        while ($year = $years->fetch_assoc()) {
                            $activeClass = (isset($_GET['year']) && $_GET['year'] == $year['projectYear']) ? 'active' : '';
                            echo '<li><a class="dropdown-item ' . $activeClass . '" href="?page=' . $page . '&year=' . $year['projectYear'] . '">' . $year['projectYear'] . '</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Year Filter End -->


        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                $startProjectDisplayed = ($page - 1) * $resultsPerPage + 1;
                $endProjectDisplayed = min($startProjectDisplayed + $resultsPerPage - 1, $totalProjects);
                $cardIndex = 1;
                // Output data for each row
                while($row = $result->fetch_assoc()) {
                    $cardAnimationClass = ($cardIndex % 2 == 0) ? 'fadeInRight' : 'fadeInLeft'; // Alternate animation class
                    echo '
                    <div class="col-12 mb-4">
                        <div class="card border-0 shadow custom-card ' . $cardAnimationClass . '">  
                            <div class="card-body text-center">
                                <p class="card-title">' . htmlspecialchars($row["projectName"]) . '</p>
                            </div>
                        </div>
                    </div>';
                    $cardIndex++;
                }
            } else {
                echo "No projects found.";
            }
            ?>
        </div>
        <!-- Pagination links -->
        <div class="row">
            <div class="col-12">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <!-- First Button -->
                        <?php if ($page > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=1" aria-label="First">
                                    <span aria-hidden="true">&laquo;&laquo;</span>
                                    <span class="visually-hidden">First</span>
                                </a>
                            </li>
                        <?php endif; ?>
                        
                        <!-- Previous Button -->
                        <?php if ($page > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo ($page - 1); ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="visually-hidden">Previous</span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <!-- Page Number Link -->
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <li class="page-item <?php echo ($page == $i) ? 'active' : ''; ?>">
                                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php endfor; ?>

                        <!-- Next Button -->
                        <?php if ($page < $totalPages): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo ($page + 1); ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="visually-hidden">Next</span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <!-- Last Button -->
                        <?php if ($page < $totalPages): ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $totalPages; ?>" aria-label="Last">
                                    <span aria-hidden="true">&raquo;&raquo;</span>
                                    <span class="visually-hidden">Last</span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Pagination Info -->
        <div class="row">
            <div class="col-12">
                <p class="pagination-info mb-3">Showing <?php echo $startProjectDisplayed; ?> - <?php echo $endProjectDisplayed; ?> of <?php echo $totalProjects; ?></p>
            </div>
        </div>
    </div>
</div>
<!-- Projects End -->


        

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>


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