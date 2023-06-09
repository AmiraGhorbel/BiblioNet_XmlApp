<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>eLEARNING - eLearning HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="style.module.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0" style="color: #2C547C;"><i style="padding-right: 15px;"><img src="img/logo.png" style="vertical-align: bottom;" width="40px" height="35px"/></i>BiblioNet</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.html" class="nav-item nav-link">Acceuil</a>
                <a href="about.html" class="nav-item nav-link">About</a>
                <a href="Book.php" class="nav-item nav-link">Books</a>
                <a href="Report.php" class="nav-item nav-link">Reports</a>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
            </div>
            <a href="ViewAll.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">View All<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <div class="container-fluid bg-primary py-5 mb-5 page-header-book">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Books</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div id="biblio-div" class="row g-4 justify-content-center">
                <?php
                $xml = new DOMDocument();
                $xml->load("biblio.xml");
                $rootTag = $xml->getElementsByTagName("biblio")->item(0);
                $livre = $xml->getElementsByTagName("livre");
                foreach ($livre as $l) {
                    $id=$l->getAttribute('id');
                    $titre = $l->getElementsByTagName('titre')->item(0)->textContent;
                    $categorie = $l->getElementsByTagName('categorie')->item(0)->textContent;
                    $nom = $l->getElementsByTagName('nom')->item(0)->textContent;
                    $prenom = $l->getElementsByTagName('prenom')->item(0)->textContent;
                    $edition = $l->getElementsByTagName('edition')->item(0)->textContent;
                    $date = $l->getElementsByTagName('date_Emprunt')->item(0)->textContent;
                    $image = $l->getElementsByTagName('image')->item(0)->getAttribute('src');
                    $description = $l->getElementsByTagName('description')->item(0)->textContent;
                    echo '<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s"><div class="course-item bg-light">
        <div class="position-relative overflow-hidden"><img class="img-fluid" src="' . $image . '" alt="">
        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
        <form action="DetailBook.php" method="post"><input type="hidden" name="id" value="'.$id.'"><button type="submit" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0;">Read more</button></form>
        </div>
    </div>
    <div id="book-list" class="text-center p-4 pb-0">
        <h4 id="AuteurName" class="mb-2">' . $titre . '</h4>
        <h6 class="mb-4">' . $categorie . '</h6>
    </div>
    <div class="d-flex border-top">
        <small class="flex-fill text-center border-end py-2">
            <i class="fa fa-user-tie text-primary me-2"></i>
            ' . $nom . $prenom . '
        </small>
        <small class="flex-fill text-center border-end py-2">
            <i class="bi bi-book-half text-primary me-2"></i>
            ' . $edition . '
        </small>
        <small class="flex-fill text-center py-2">
            <i class="bi bi-calendar2-date-fill text-primary me-2"></i>
            ' . $date . '
        </small>
    </div>
</div></div>';
                }
                ?>
            </div>
        </div>
        <div class="container">
            <div id="reports-div" class="row g-4 justify-content-center">
                <?php
                $xml = new DOMDocument();
                $xml->load("reports.xml");
                $rootTag = $xml->getElementsByTagName("reports")->item(0);
                $report = $xml->getElementsByTagName("report");
                
                foreach ($report as $r) {
                    $image = $r->getElementsByTagName('image')->item(0)->getAttribute('src');
                    $stage = $r->getElementsByTagName('stage')->item(0)->textContent;
                    $specialite = $r->getElementsByTagName('specialite')->item(0)->textContent;
                    $titre = $r->getElementsByTagName('titre')->item(0)->textContent;
                    $etudiant = $r->getElementsByTagName('etudiant')->item(0)->textContent;
                    $date = $r->getElementsByTagName('date')->item(0)->textContent;
                    $presedent = $r->getElementsByTagName('presedent')->item(0)->textContent;
                    $id=$r->getAttribute('id');
                    $examinateur = $r->getElementsByTagName('examinateur')->item(0)->textContent;
                    $encadreur = $r->getElementsByTagName('encadreur')->item(0)->textContent;
                    echo '<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s"><div class="course-item bg-light">
        <div class="position-relative overflow-hidden"><img class="img-fluid" src="' . $image . '" alt="">
        <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
            <form action="DetailReport.php" method="post"><input type="hidden" name="id" value="'.$id.'"><button type="submit" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0;">Read more</button></form>
        </div>
    </div>
    <div id="book-list" class="text-center p-4 pb-0">
        <h4 id="AuteurName" class="mb-2">' . $titre. '</h4>
        <h6 class="mb-4">' . $specialite . '</h6>
    </div>
    <div class="d-flex border-top">
        <small class="flex-fill text-center border-end py-2">
            <i class="fa fa-user-tie text-primary me-2"></i>
            ' . $etudiant . '
        </small>
        <small class="flex-fill text-center border-end py-2">
            <i class="bi bi-book-half text-primary me-2"></i>
            ' . $stage . '
        </small>
        <small class="flex-fill text-center py-2">
            <i class="bi bi-calendar2-date-fill text-primary me-2"></i>
            ' . $date . '
        </small>
    </div>
</div></div>';
                }
                ?>
            </div>
        </div>
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-3">Quick Link</h4>
                        <a class="btn btn-link" href="">About Us</a>
                        <a class="btn btn-link" href="">Contact Us</a>
                        <a class="btn btn-link" href="">Privacy Policy</a>
                        <a class="btn btn-link" href="">Terms & Condition</a>
                        <a class="btn btn-link" href="">FAQs & Help</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-3">Contact</h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-3">Gallery</h4>
                        <div class="row g-2 pt-2">
                            <div class="col-4">
                                <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light p-1" src="img/course-3.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light p-1" src="img/course-2.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light p-1" src="img/course-3.jpg" alt="">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid bg-light p-1" src="img/course-1.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-3">Newsletter</h4>
                        <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.

                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                            Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a><br><br>
                            Distributed By <a class="border-bottom" href="https://themewagon.com">ThemeWagon</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>


</body>

</html>