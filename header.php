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
                            <a href="anglais.html">
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
                                    <a href="shop-fullwidth.html">
                                        <span class="menu-text">Shop</span>
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <div class="mega-menu dropdown-hover">
                                        <div class="menu-colum">
                                            <ul>
                                                <li><span class="mega-menu-text"> Occasion</span></li>
                                                <?php foreach ($categories as $category): ?>
                                                <li><a href="birthday.html"><?= htmlspecialchars($category['libelle'])?></a></li>
                                                <?php endforeach;?>
                                                <li><a href="valentine.html">Valentine's Day</a></li>
                                                <li><a href="wedding.html">Wedding</a></li>
                                                <li><a href="parties.html">Parties</a></li>
                                                <li><a href="Motherday.html">Mother's day</a></li>
                                            </ul>
                                        </div>
                                        <div class="menu-colum">
                                            <ul>
                                                <li><span class="mega-menu-text">Product</span></li>
                                                <li><a href="roses.html">Roses</a></li>
                                                <li><a href="roseschocolate.html">Roses and chocolate</a></li>
                                                <li><a href="teddy.html">Roses and teddy</a></li>
                                                             
                                            </ul>
                                        </div>
                                        <div class="menu-colum">
                                            <ul>
                                                <li><span class="mega-menu-text">Services</span></li>
                                                <li><a href="Prestige-Gift.html">Prestige Gift</a></li>
                                                <li><a href="flowerdecoration.html">Flower decoration</a></li>
                                                <li><a href="Car-decoration.html">Car decoration </a></li>
                                                <li><a href="Birthday-bouquet.html">Birthday bouquet</a></li>
                                                <li><a href="BO.html">Bouquet of roses for the bride</a></li>
                                            </ul> 
                                        </div>
                                    </div>
                                </li>
                           
                         
                                <li>
                                    <a href="about-us.html">
                                        <span class="menu-text"> About</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="contact.html">
                                        <span class="menu-text"> Contact Us</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="admin/inedix.php">
                                        <span class="menu-text"> login</span>
                                    </a>
                                </li>

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
                                
                                    <ul >
                                        <li><a href="index.php">Home</a></li>
                                      
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="shop-fullwidth.html">Shop</a>
                                    <ul class="megamenu dropdown">
                                       
                                                <ul>
                                                    <li><span class="mega-menu-text"> Occasion</span></li>
                                                    <li><a href="birthday.html">Birthday</a></li>
                                                    <li><a href="valentine.html">Valentine's Day</a></li>
                                                    <li><a href="wedding.html">Wedding</a></li>
                                                    <li><a href="parties.html">Parties</a></li>
                                                    <li><a href="Motherday.html">Mother's day</a></li>
                                                </ul>
                                            </div>
                                            <div class="menu-colum">
                                                <ul>
                                                    <li><span class="mega-menu-text">Product</span></li>
                                                    <li><a href="roses.html">Roses</a></li>
                                                    <li><a href="roseschocolate.html">Roses and chocolate</a></li>
                                                    <li><a href="teddy.html">Roses and teddy</a></li>
                                               
                                                </ul>
                                            </div>
                                            <div class="menu-colum">
                                                <ul>
                                                    <li><span class="mega-menu-text">Services</span></li>
                                                    <li><a href="Prestige-Gift.html">Prestige Gift</a></li>
                                                    <li><a href="flowerdecoration.html">Flower decoration</a></li>
                                                    <li><a href="Car-decoration.html">Car decoration </a></li>
                                                    <li><a href="Birthday-bouquet.html">Birthday bouquet</a></li>
                                                    <li><a href="BO.html">Bouquet of roses for the bride</a></li>
                                                </ul>     
                                      
                                        </li>
                                    </ul>
                                </li>
                             
                           
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="contact-us.html">Contact</a></li>
                                <li>
                                    <a href="admin/inedix.php">
                                        <span class="menu-text"> login</span>
                                    </a>
                                </li>
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
                                        <li><a href="arabic.html">العربية</a>
                                            <ul class="switcher-dropdown">
                                            
                                                <li><a href="french.html">French</a></li>
                                                <li><a href="anglais.html">Anglais</a></li>
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
                            <li><a href="about-us.html">About Us</a></li>
                        </ul>
                        <p class="desc-content">In the heart of the bustling city of Ouarzazate, among digital pixels and algorithms, lies “OZAME SHOP”,  a charming online flower shop. OUSSAMA, the energetic owner, had a penchant for mixing flowers with sentiment.   His fingers danced on the keyboard, orchestrating virtual bouquets whispering love, solace and celebration.

                            One day, as the sun painted the sky with colors of coral and lavender</p>

                        <div class="switcher">
                            <div class="language">
                                <span class="switcher-title">Language: </span>
                                <div class="switcher-menu">
                                    <ul>
                                        <li><a href="arabic.html">العربية</a>
                                            <ul class="switcher-dropdown">
                                            
                                                <li><a href="french.html">French</a></li>
                                                <li><a href="anglais.html">Anglais</a></li>
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
    </header>
    <!-- Header Area End Here -->