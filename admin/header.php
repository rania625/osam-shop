<?php
session_start();
$connextion = false;
if(isset($_SESSION['utilisateur'])){
  $connextion = true;
}

?>




<nav class="main-header-area">
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
                                        <span> Ajouter utilisateur</span>
                                       
                                    </a>
                                    <?php
                         if($connextion){
            
                                  ?>
                                </li>
                                   <li>
                                    <a href="categories.php">
                                        <span class="menu-text"> liste des catégories</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="produits.php">
                                        <span class="menu-text">liste des produits </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Ajouter_categorie.php">
                                        <span class="menu-text">Ajouter catégorie </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Ajouter_produit.php">
                                        <span class="menu-text">Ajouter produit </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="logout.php">
                                        <span class="menu-text">Déconnexion </span>
                                    </a>
                                </li>
                                <?php
                                  }else{
                                    ?>
                                     <li>
                                    <a href="connextion.php">
                                        <span class="menu-text">connextion </span>
                                    </a>
                                </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </nav>
                        <div class="header-right-area main-nav">
                            <ul class="nav">
                                <li class="minicart-wrap">
                                 
                                 
                                </li>
                              
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
        <!-- off-canvas menu start -->
        <aside class="off-canvas-wrapper" id="mobileMenu">
            <div class="off-canvas-overlay"></div>
            <div class="off-canvas-inner-content">
                <div class="btn-close-off-canvas">
                    <i class="fa fa-times"></i>
                </div>
                <div class="off-canvas-inner">
             
                    <!-- mobile menu start -->
                    <div class="mobile-navigation">
                        <!-- mobile menu navigation start -->
                        <nav>
                            <ul class="mobile-menu">
                                
                            <li>
                                    <a class="active" href="index.php">
                                        <span> Ajouter utilisateur</span>
                                       
                                    </a>
                                    <?php
                         if($connextion){
            
                                  ?>
                                </li>
                                   <li>
                                    <a href="categories.php">
                                        <span class="menu-text"> liste des catégories</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="produits.php">
                                        <span class="menu-text">liste des produits </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Ajouter_categorie.php">
                                        <span class="menu-text">Ajouter catégorie </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Ajouter_produit.php">
                                        <span class="menu-text">Ajouter produit </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="logout.php">
                                        <span class="menu-text">Déconnexion </span>
                                    </a>
                                </li>
                                <?php
                                  }else{
                                    ?>
                                     <li>
                                    <a href="connextion.php">
                                        <span class="menu-text">connextion </span>
                                    </a>
                                </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </nav>
                        <!-- mobile menu navigation end -->
                    </div>
                    <!-- mobile menu end -->
                    <div class="offcanvas-widget-area">
                        <div class="switcher">
                            <div class="language">
                                <span class="switcher-title">Language: </span>
                                <div class="switcher-menu">
                                    <ul>
                                        <li><a href="arabic.php">العربية</a>
                                            <ul class="switcher-dropdown">
                                            
                                                <li><a href="french.php">French</a></li>
                                                <li><a href="index.php">Anglais</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                    
                        </div>
                        <div class="top-info-wrap text-left text-black">
                            <ul class="address-info">
                                <li>
                                    <i class="fa fa-phone"></i>
                              
                                    <a target="_blank" href="tel:(+212) 629479226">(+212) 629479226</a> 
                                   <br> <a target="_blank" href="tel:(+212) 651015789">(+212) 651015789</a>
                                </li>
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    <a target="_blank" href="https://mail.google.com/mail/oussamachliah347@gmail">oussamachliah347@gmail</a>
                                </li>  
                            </ul>
                            <div class="widget-social">
                                <a target="_blank" class="facebook-color-bg" title="Facebook-f" href="https://www.facebook.com/salwa.ridnass"><i class="fa fa-facebook-f"></i></a>
                                
                                <a target="_blank" class="whatsapp-color-bg" title="whatsapp" href="https://wa.me/+212629479226"><i class="fa fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <!-- off-canvas menu end -->
        <!-- off-canvas menu start -->
        <aside class="off-canvas-menu-wrapper" id="sideMenu">
            <div class="off-canvas-overlay"></div>
            <div class="off-canvas-inner-content">
                <div class="off-canvas-inner">
                    <div class="btn-close-off-canvas">
                        <i class="fa fa-times"></i>
                    </div>
                    <!-- offcanvas widget area start -->
                    <div class="offcanvas-widget-area">
                        <ul class="menu-top-menu">
                            <li><a href="about-us.php">About Us</a></li>
                        </ul>
                        <p class="desc-content">In the heart of the bustling city of Ouarzazate, among digital pixels and algorithms, lies “OZAME SHOP”,  a charming online flower shop. OUSSAMA, the energetic owner, had a penchant for mixing flowers with sentiment.   His fingers danced on the keyboard, orchestrating virtual bouquets whispering love, solace and celebration.

                            One day, as the sun painted the sky with colors of coral and lavender</p>

                        <div class="switcher">
                            <div class="language">
                                <span class="switcher-title">Language: </span>
                                <div class="switcher-menu">
                                    <ul>
                                        <li><a href="arabic.php">العربية</a>
                                            <ul class="switcher-dropdown">
                                            
                                                <li><a href="french.php">French</a></li>
                                                <li><a href="index.php">Anglais</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                     
                        </div>
                        <div class="top-info-wrap text-left text-black">
                            <ul class="address-info">
                                <li>
                                    <i class="fa fa-phone"></i>
                              
                                    <a target="_blank" href="tel:(+212) 629479226">(+212) 629479226</a> 
                                   <br> <a target="_blank" href="tel:(+212) 651015789">(+212) 651015789</a>
                                </li>
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    <a target="_blank" href="https://mail.google.com/mail/oussamachliah347@gmail">oussamachliah347@gmail</a>
                                </li>  
                            </ul>
                            <div class="widget-social">
                                <a target="_blank" class="facebook-color-bg" title="Facebook-f" href="https://www.facebook.com/salwa.ridnass"><i class="fa fa-facebook-f"></i></a>
                                
                                <a target="_blank" class="whatsapp-color-bg" title="whatsapp" href="https://wa.me/+212629479226"><i class="fa fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- offcanvas widget area end -->
                </div>
            </div>
        </aside>
        <!-- off-canvas menu end -->
</nav>