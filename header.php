<?php
require_once 'admin/include/database.php';

$categories = $pdo->query("SELECT * FROM categorie")->fetchAll(PDO::FETCH_ASSOC);
?>

<header class="main-header-area">
    <!-- Main Header Area Start -->
    <div class="main-header header-sticky">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-2 col-xl-2 col-sm-6 col-6 col-custom">
                    <div class="header-logo d-flex align-items-center">
                        <a href="index.php">
                            <img class="img-full" src="assets/images/logo/osam2.jpg" alt="Header Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-xl-10 col-sm-6 col-6 position-static d-flex justify-content-end col-custom">
                    <nav class="main-nav mr-5 d-none d-lg-flex">
                        <ul class="nav">
                            <li>
                                <a class="active" href="index.php">
                                    <span> Home</span>
                                </a>
                            </li>
                            <li>
                                <a href="shop-fullwidth.php">
                                    <span class="menu-text">Shop</span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <div class="mega-menu dropdown-hover">
                                    <div class="menu-colum">
                                        <ul>
                                            <li><span class="mega-menu-text">Occasion</span></li>
                                            <?php foreach ($categories as $category): ?>
                                                <li><a href="birthday.php"><?= htmlspecialchars($category['libelle']) ?></a></li>
                                            <?php endforeach; ?>
                                            <li><a href="valentine.php">Valentine's Day</a></li>
                                            <li><a href="wedding.php">Wedding</a></li>
                                            <li><a href="parties.php">Parties</a></li>
                                            <li><a href="Motherday.php">Mother's Day</a></li>
                                        </ul>
                                    </div>
                                    <div class="menu-colum">
                                        <ul>
                                            <li><span class="mega-menu-text">Product</span></li>
                                            <li><a href="roses.php">Roses</a></li>
                                            <li><a href="roseschocolate.php">Roses and Chocolate</a></li>
                                            <li><a href="teddy.php">Roses and Teddy</a></li>
                                        </ul>
                                    </div>
                                    <div class="menu-colum">
                                        <ul>
                                            <li><span class="mega-menu-text">Services</span></li>
                                            <li><a href="Prestige-Gift.php">Prestige Gift</a></li>
                                            <li><a href="flowerdecoration.php">Flower Decoration</a></li>
                                            <li><a href="Car-decoration.php">Car Decoration</a></li>
                                            <li><a href="Birthday-bouquet.php">Birthday Bouquet</a></li>
                                            <li><a href="BO.php">Bouquet of Roses for the Bride</a></li>
                                        </ul> 
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="about-us.php">
                                    <span class="menu-text"> About</span>
                                </a>
                            </li>
                            <li>
                                <a href="contact.php">
                                    <span class="menu-text"> Contact Us</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="header-right-area main-nav">
                        <ul class="nav">
                            <li class="minicart-wrap"></li>
                            <li class="account-menu-wrap d-none d-lg-flex">
                                <a href="#" class="off-canvas-menu-btn">
                                    <i class="fa fa-bars"></i>
                                </a>
                            </li>
                            <li class="mobile-menu-btn d-lg-none">
                                <a class="off-canvas-btn" href="#">
                                    <i class="fa fa-bars"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Header Area End -->
    <!-- Off-canvas menu and other content follows -->
</header>