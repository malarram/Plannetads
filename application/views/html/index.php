<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">
    <title>Your page title here :)</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/uikit.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/selectric/selectric.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/vegas/vegas.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/plugins/language-switcher/polyglot-language-switcher-2.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">

    <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/favicon.png">

</head>

<body>

    <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <!-- Off-canvas Navigation -->
    <div id="my-id" class="uk-offcanvas">
        <div class="uk-offcanvas-bar uk-offcanvas-bar-flip ">
            <ul class="uk-nav uk-nav-offcanvas" data-uk-nav>
                <li> 
                    <a href="#select-language" class="uk-button-link uk-button" data-uk-modal><img src="<?php echo base_url(); ?>assets/images/flags/United-states-flag.png" alt="" class="uk-margin-small-right">English</a>
                </li>
                <div class="uk-nav-divider"></div>
                <li><a href="#signin_form" data-uk-modal>Sign In</a></li>
                <li><a href="select-category.html">Post an Ad</a></li>
                <li class="uk-nav-divider"></li>
                <li><a href="">About us</a></li>
                <li><a href="">Help</a></li>
                <li><a href="">Contact</a></li>
            </ul>
        </div>
    </div>
    <!-- Header starts -->
    <header>
        <nav class="uk-navbar">
            <div class="uk-container uk-container-center">
                <a href="" class="uk-navbar-brand "><img src="<?php echo base_url(); ?>assets/images/logo-large.png" width="180" alt="plannetads" class="uk-hidden-small"><img src="<?php echo base_url(); ?>assets/images/logo-small.png" alt="plannetads" class="uk-visible-small" width="60"></a>
                <div class=" language uk-navbar-content uk-hidden-small ">
                             <!-- polyglot language switcher with flags -->
                <div class="polyglot-language-switcher" data-grid-columns="2" data-anim-effect="slide" data-open-mode="click">
                    <ul style="display: none">
                        <li><a href="#" title="Catalan" data-lang-id="ca_ES"><img src="<?php echo base_url(); ?>assets/images/flags/catalonia.png" alt="Catalonia"> Català</a></li>
                        <li><a href="#" title="Czech" data-lang-id="cz_CZ"><img src="<?php echo base_url(); ?>assets/images/flags/cz.png" alt="Czech Republic"> Čeština</a></li>
                        <li><a href="#" title="Danish" data-lang-id="dk_DK"><img src="<?php echo base_url(); ?>assets/images/flags/dk.png" alt="Denmark"> Dansk</a></li>
                        <li><a href="#" title="German" data-lang-id="de_DE"><img src="<?php echo base_url(); ?>assets/images/flags/de.png" alt="Germany"> Deutsch</a></li>
                        <li><a href="#" title="Estonian" data-lang-id="ee_EE"><img src="<?php echo base_url(); ?>assets/images/flags/ee.png" alt="Estonia"> Eesti</a></li>
                        <li><a href="#" title="English (UK)" data-lang-id="en_UK"><img src="<?php echo base_url(); ?>assets/images/flags/gb.png" alt="United Kingdom"> English (UK)</a></li>
                        <li><a href="#" title="English (US)"  data-lang-id="en_US" class="pls-selected-locale"><img src="<?php echo base_url(); ?>assets/images/flags/us.png" alt="United States"> English (US)</a></li>
                        <li><a href="#" title="Spanish" data-lang-id="es_ES"><img src="<?php echo base_url(); ?>assets/images/flags/es.png" alt="Spain"> Español</a></li>
                        <li><a href="#" title="French (Canada)" data-lang-id="fr_CA"><img src="<?php echo base_url(); ?>assets/images/flags/ca.png" alt="Canada"> Français (Canada)</a></li>
                        <li><a href="#" title="French (France)" data-lang-id="fr_FR"><img src="<?php echo base_url(); ?>assets/images/flags/fr.png" alt="France"> Français (France)</a></li>
                        <li><a href="#" title="Croatian" data-lang-id="hr_HR"><img src="<?php echo base_url(); ?>assets/images/flags/hr.png" alt="Croatia"> Hrvatski</a></li>
                        <li><a href="#" title="Icelandic" data-lang-id="is_IS"><img src="<?php echo base_url(); ?>assets/images/flags/is.png" alt="Iceland"> ‏Íslenska</a></li>
                        <li><a href="#" title="Italian" data-lang-id="it_IT"><img src="<?php echo base_url(); ?>assets/images/flags/it.png" alt="Italy"> Italiano</a></li>
                        <li><a href="#" title="Latvian" data-lang-id="lv_LV"><img src="<?php echo base_url(); ?>assets/images/flags/lv.png" alt="Latvia"> Latviešu</a></li>
                        <li><a href="#" title="Lithuanian" data-lang-id="lt_LT"><img src="<?php echo base_url(); ?>assets/images/flags/lt.png" alt="Lithuania"> Lietuvių</a></li>
                        <li><a href="#" title="Hungarian" data-lang-id="hu_HU"><img src="<?php echo base_url(); ?>assets/images/flags/hu.png" alt="Hungary"> Magyar</a></li>
                        <li><a href="#" title="Dutch" data-lang-id="nl_NL"><img src="<?php echo base_url(); ?>assets/images/flags/nl.png" alt="Netherlands"> Nederlands</a></li>
                        <li><a href="#" title="Dutch (Belgium)" data-lang-id="nl_BE"><img src="<?php echo base_url(); ?>assets/images/flags/be.png" alt="Belgium"> Nederlands (België)</a></li>
                        <li><a href="#" title="Norwegian (bokmal)" data-lang-id="no_NO"><img src="<?php echo base_url(); ?>assets/images/flags/no.png" alt="Norway"> Norsk (bokmål)</a></li>
                        <li><a href="#" title="Norwegian (nynorsk)" data-lang-id="ny_NO"><img src="<?php echo base_url(); ?>assets/images/flags/no.png" alt="Norway"> Norsk (nynorsk)</a></li>
                    </ul>
                </div>
                <!-- end polyglot language switcher without flags -->
                  <!--   <a href="#select-language" class="uk-button-link uk-button" data-uk-modal><img src="images/flags/United-states-flag.png" alt="" class="uk-margin-small-right">English</a> --></div>
                <div class="uk-navbar-content uk-navbar-flip uk-hidden-small">
                    <a class="uk-button uk-button-large uk-margin-small-right" href="#signin_form" data-uk-modal><span >Sign in</span></a>

                    <a class="uk-button uk-button-large uk-button-success" href="select-category.html">Post an Ad</a>
                </div>
                <a href="#my-id" data-uk-offcanvas class="uk-visible-small off-canvas-btn uk-float-right uk-button-link uk-button uk-button-large"><i class="uk-icon-bars"></i></a>
            </div>
        </nav>
    </header>

    <!-- Search bar starts -->
    <div class="main-search">
            <div class="uk-container uk-container-center">
                <div class="uk-block">
                    <h1>Sell / Buy / Find Everything you want</h1>
                    <form class="search-container">
                        <div class="uk-grid uk-grid-collapse">
                            <div class="uk-width-medium-1-4 uk-width-small-1-1">
                                <select class="uk-form custom-select">
                                    <option value="1">All Category</option>
                                    <option value="2">Vehicles</option>
                                    <option value="3">For Rrent</option>
                                    <option value="4">Pets</option>
                                    <option value="5">Services</option>
                                    <option value="6">Real Estate</option>
                                    <option value="7">Jobs</option>
                                    <option value="8">Community</option>
                                </select>
                            </div>
                            <div class="uk-width-medium-4-10 uk-width-small-1-1" data-uk-search>
                                <input class="keyword-input" id="keyword" type="search" placeholder="Type a keyword">
                            </div>
                            <div class="uk-width-medium-1-4 uk-width-small-1-1 uk-form-icon" data-uk-search>
                                <i class="uk-icon-map-marker"></i>
                                <input class="location-input" id="location" type="search" placeholder="India">
                            </div>
                            <div class="uk-width-medium-1-10 uk-small-medium-1-1" data-uk-search>
                                <input type="submit" name="submit" value="Search" id="submit-search" class="loc-search uk-button-primary uk-button-large uk-button">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div> 

    <!-- Featured Listing -->
    <div class="uk-container uk-container-center featured-listing">
        <div class="uk-block uk-text-center">
            <h2 class="uk-text-upper">Featured Ads</h2>
            <p>Lorem ipsum dolor sit amet, Vivamus congue euismod ex, at sodales eros tincidunt eget
                <br> In hac habitasse platea dictumst. Nulla commodo elementum elit, et ultrices magna venenatis nec</p>
        </div>

        <div data-uk-slideset="{small: 2, medium: 4, large: 4}">
            <div class="uk-slidenav-position uk-slidenav-custom">
                <a href="" class="uk-slidenav uk-slidenav-previous" data-uk-slideset-item="previous"></a>
                <a href="" class="uk-slidenav uk-slidenav-next" data-uk-slideset-item="next"></a>
            </div>
            <ul class="uk-grid uk-slideset">
                <li>
                    <div class="uk-panel uk-panel-box">
                        <div class="uk-panel-teaser">
                            <a href=""> <img src="<?php echo base_url(); ?>assets/images/featured/1.jpg" alt=""></a>
                        </div>
                        <span class="uk-text-danger uk-text-bold uk-text-small">20 USD</span>
                        <h5 class="uk-margin-top-remove"><a href=""> Handmade Old Style Multicolor</a></h5>
                    </div>
                </li>
                <li>
                    <div class="uk-panel uk-panel-box">
                        <div class="uk-panel-teaser">
                            <a href=""><img src="<?php echo base_url(); ?>assets/images/featured/2.jpg" alt=""></a>
                        </div>
                        <span class="uk-text-danger uk-text-bold uk-text-small">20 USD</span>
                        <h5 class="uk-margin-top-remove"><a href=""> Handmade Old Style Multicolor</a></h5>
                    </div>
                </li>
                <li>
                    <div class="uk-panel uk-panel-box">
                        <div class="uk-panel-teaser">
                            <a href=""><img src="<?php echo base_url(); ?>assets/images/featured/3.jpg" alt=""></a>
                        </div>
                        <span class="uk-text-danger uk-text-bold uk-text-small">20 USD</span>
                        <h5 class="uk-margin-top-remove"><a href=""> Handmade Old Style Multicolor</a></h5>
                    </div>
                </li>
                <li>
                    <div class="uk-panel uk-panel-box">
                        <div class="uk-panel-teaser">
                            <a href=""><img src="<?php echo base_url(); ?>assets/images/featured/4.jpg" alt=""></a>
                        </div>
                        <span class="uk-text-danger uk-text-bold uk-text-small">20 USD</span>
                        <h5 class="uk-margin-top-remove"><a href=""> Handmade Old Style Multicolor</a></h5>
                    </div>
                </li>
                <li>
                    <div class="uk-panel uk-panel-box">
                        <div class="uk-panel-teaser">
                            <a href=""><img src="<?php echo base_url(); ?>assets/images/featured/5.jpg" alt=""></a>
                        </div>
                        <span class="uk-text-danger uk-text-bold uk-text-small">20 USD</span>
                        <h5 class="uk-margin-top-remove"><a href=""> Handmade Old Style Multicolor</a></h5>
                    </div>
                </li>
                <li>
                    <div class="uk-panel uk-panel-box">
                        <div class="uk-panel-teaser">
                            <a href=""><img src="<?php echo base_url(); ?>assets/images/featured/6.jpg" alt=""></a>
                        </div>
                        <span class="uk-text-danger uk-text-bold uk-text-small">20 USD</span>
                        <h5 class="uk-margin-top-remove"><a href=""> Handmade Old Style Multicolor</a></h5>
                    </div>
                </li>
                <li>
                    <div class="uk-panel uk-panel-box">
                        <div class="uk-panel-teaser">
                            <a href=""><img src="<?php echo base_url(); ?>assets/images/featured/7.jpg" alt=""></a>
                        </div>
                        <span class="uk-text-danger uk-text-bold uk-text-small">20 USD</span>
                        <h5 class="uk-margin-top-remove"><a href=""> Handmade Old Style Multicolor</a></h5>
                    </div>
                </li>
                <li>
                    <div class="uk-panel uk-panel-box">
                        <div class="uk-panel-teaser">
                            <a href=""><img src="<?php echo base_url(); ?>assets/images/featured/1.jpg" alt=""></a>
                        </div>
                        <span class="uk-text-danger uk-text-bold uk-text-small">20 USD</span>
                        <h5 class="uk-margin-top-remove"><a href=""> Handmade Old Style Multicolor</a></h5>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- Category Listing -->
    <div class="uk-container uk-container-center categories-listing">
        <div class="uk-block uk-text-center">
            <h2 class="uk-text-upper">Browse categories</h2>
            <p>Lorem ipsum dolor sit amet, Vivamus congue euismod ex, at sodales eros tincidunt eget
                <br> In hac habitasse platea dictumst. Nulla commodo elementum elit, et ultrices magna venenatis nec</p>
        </div>
        <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-4" data-uk-grid="{gutter: 20}">
            <div class="uk-panel">
                <h3 class="uk-margin-remove"><a href="main-category.html" class="uk-panel-title uk-display-block"><i class="uk-icon-car uk-margin-small-right"></i>Automotive</a></h3>
                <div class="uk-panel-box">
                    <ul class="uk-list uk-list-space">
                        <li><a href="sub-category.html">Bikes</a></li>
                        <li><a href="">Automotive Items & Parts</a></li>
                        <li><a href="">Boats & Watercraft</a></li>
                        <li><a href="">Cars</a></li>
                        <li><a href="">Classic Cars</a></li>
                        <li><a href="">Motorcycles</a></li>
                    </ul>
                </div>
            </div>
            <div class="uk-panel">
               <h3 class="uk-margin-remove"><a href="" class="uk-panel-title uk-display-block"><i class="uk-icon-home uk-margin-small-right"></i>For Rent</a></h3>
                <div class="uk-panel-box">
                    <ul class="uk-list uk-list-space">
                        <li><a href="">Apartments</a></li>
                        <li><a href="">Commercial Lease</a></li>
                        <li><a href="">Condos For Rent</a></li>
                        <li><a href="">Housing Wanted</a></li>
                        <li><a href="">Mobile Homes For Rent</a></li>
                        <li><a href="">Roommates</a></li>
                        <li><a href="">Townhomes For Rent</a></li>
                        <li><a href="">Vacation Homes</a></li>

                    </ul>
                </div>
            </div>
            <div class="uk-panel">
                   <h3 class="uk-margin-remove"><a href="" class="uk-panel-title uk-display-block"><i class="uk-icon-suitcase uk-margin-small-right"></i>Jobs</a></h3>
                <div class="uk-panel-box">
                    <ul class="uk-list uk-list-space">
                        <li><a href="">Accounting & Bookkeeping Jobs</a></li>
                        <li><a href="">Business Opportunities</a></li>
                        <li><a href="">Cleaning Jobs</a></li>
                        <li><a href="">Construction Work</a></li>
                        <li><a href="">Creative Jobs</a></li>
                        <li><a href="">Educational Jobs</a></li>
                        <li><a href="">Financial & Real Estate Jobs</a></li>
                        <li><a href="">IT Jobs</a></li>
                        <li><a href="">Labor Jobs</a></li>
                        <li><a href="">Legal Jobs</a></li>
                        <li><a href="">Office Jobs</a></li>
                    </ul>
                </div>
            </div>
            <div class="uk-panel">
                 <h3 class="uk-margin-remove"><a href="" class="uk-panel-title uk-display-block"><i class="uk-icon-tags uk-margin-small-right"></i> Items for Sale</a></h3>
                <div class="uk-panel-box">
                    <ul class="uk-list uk-list-space">
                        <li><a href="">Art & Crafts</a></li>
                        <li><a href="">Automotive Items & Parts</a></li>
                        <li><a href="">Bicycles</a></li>
                        <li><a href="">Books & Magazines</a></li>
                        <li><a href="">Clothing & Apparel</a></li>
                    </ul>
                </div>
            </div>
            <div class="uk-panel">
                 <h3 class="uk-margin-remove"><a href="" class="uk-panel-title uk-display-block"><i class="uk-icon-laptop uk-margin-small-right"></i>Electronics</a></h3>
                <div class="uk-panel-box">
                    <ul class="uk-list uk-list-space">
                        <li><a href="">Sound & Vision</a></li>
                        <li><a href="">Computers</a></li>
                        <li><a href="">Video Games & Consoles</a></li>
                        <li><a href="">Cameras & Photo</a></li>
                        <li><a href="">Televisions</a></li>
                        <li><a href="">Car Electronics </a></li>
                        <li><a href="">Other Computing </a></li>
                    </ul>
                </div>
            </div>
            <div class="uk-panel">
                <h3 class="uk-margin-remove"><a href="" class="uk-panel-title uk-display-block"><i class="uk-icon-laptop uk-margin-small-right"></i>Fashion & Accessories</a></h3>
                <div class="uk-panel-box">
                    <ul class="uk-list uk-list-space">
                        <li><a href="">Fashion Woman </a></li>
                        <li><a href="">Women's Bags </a></li>
                        <li><a href="">Jewelry & Watches</a></li>
                        <li><a href="">Fashion Men</a></li>
                        <li><a href="">Belts</a></li>
                        <li><a href="">Glasses </a></li>
                        <li><a href="">Watches  </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div id="footer" class="uk-container uk-container-center uk-text-center">
            <ul class="uk-list">
                <li><a href="">About us</a></li> |
                <li><a href="">Help</a></li> |
                <li><a href="">Privacy policy</a></li> |
                <li><a href="">Terms of use</a></li> |
                <li><a href="">Contact</a></li>
            </ul>
        </div>
    </footer>
    <!-- Sign up form starts -->
    <div id="signup_form" class="uk-modal">
        <div class="uk-modal-dialog">
            <a class="uk-modal-close uk-close"></a>
            <div class="uk-modal-header">
                <h3 class="uk-text-muted">Register</h3>
            </div>
            <form class="uk-form uk-form-stacked" name="user_registeration" id="user_registeration" method="post">
                <div class="uk-grid uk-form-row">
                    <div class="uk-width-1-1">
                        <label class="uk-form-label " for="name">Name</label>
                        <input type="text" placeholder="Full Name" id="name" name="name" class="uk-width-1-1 uk-form-large">
                    </div>
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="email">Email</label>
                    <input type="email" placeholder="Email Address" id="email" name="email" class="uk-width-1-1 uk-form-large">
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="password">Password</label>
                    <input type="password" placeholder="Password" id="password" name="password" class="uk-width-1-1 uk-form-large">
                </div>

                <div class="uk-form-row">
                    <button class="uk-width-1-1 uk-button uk-button-large uk-button-primary " type="submit" id="sign-up">Sign up</button>
                </div>
				<div style="display:none;" id="register_sucess" class="uk-alert uk-alert-success">
				<p>Registered sucessfully</br>Please check your email for activation</p>
				</div>
				<div style="display:none;" id="email_exist" class="uk-alert uk-alert-danger">
				<p>Email Already Exist</p>
				</div>
            </form>
            <div class="uk-modal-footer uk-text-center">Already have account? <a href="#signin_form" data-uk-modal="{target:'#signin_form'}">Sign in</a></div>
        </div>
    </div>
    <!-- Sign up form ends -->

    <!-- Sign in form starts -->
    <div id="signin_form" class="uk-modal">
        <div class="uk-modal-dialog">
            <a class="uk-modal-close uk-close"></a>
            <div class="uk-modal-header">
                <h3 class="uk-text-muted">Sign in to your account</h3>
            </div>
            <form class="uk-form uk-form-stacked">
                <div class="uk-form-row">
                    <label class="uk-form-label" for="username">Username</label>
                    <input type="text" placeholder="Username" id="username" class="uk-width-1-1 uk-form-large">
                </div>

                <div class="uk-form-row">
                    <label class="uk-form-label" for="password">Password</label>
                    <input type="password" placeholder="Password"  id="password" class="uk-form-large uk-width-1-1">
                    <p class="uk-form-help-block uk-text-right"><a href="#forgot_password_form" class="uk-text-small" data-uk-modal="{target:'#forgot_password_form'}">Forgot password?</a></p>
                </div>

                <div class="uk-modal-footer uk-text-center">  
                    <div class="uk-form-row">
                        <div class="uk-float-left uk-margin-small-bottom">
                            Don't have an account? 
                    <a href="#signup_form" data-uk-modal="{target:'#signup_form'}">Sign up now</a>
                        </div>
                        <button class="uk-width-medium-3-10 uk-width-small-1-1 uk-button uk-button-large uk-button-primary uk-float-right" type="button" onclick="location.href='my-ads.html';">Sign in</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Sign in form ends -->


    <!-- Forgot password form starts -->
    <div id="forgot_password_form" class="uk-modal">
        <div class="uk-modal-dialog">
            <a class="uk-modal-close uk-close"></a>
            <div class="uk-modal-header">
                <h3 class="uk-text-muted">Reset password</h3></div>
            <div class="uk-alert uk-alert-success">
                <p>Password reset link has been sent to your email id</p>
            </div>
            <form class="uk-form uk-form-stacked">
                <div class="uk-form-row">
                    <label class="uk-form-label" for="email">Enter your email address to reset your password</label>
                    <input type="email" placeholder="Enter your email" id="email" class="uk-width-1-1 uk-form-danger uk-form-large">
                </div>

                <div class="uk-form-row">
                    <a href="#signin_form" class="uk-align-left uk-margin-small-top" data-uk-modal="{target:'#signin_form'}">Back to login</a>
                    <button class="uk-align-right uk-button uk-button-large uk-button-primary " type="button">Reset my password</button>
                </div>
            </form>

            <div class="uk-modal-footer uk-text-center">Don't have an account? <a href="#signup_form" data-uk-modal="{target:'#signup_form'}">Sign up now</a></div>
        </div>
    </div>
    <!-- Forgot password form ends -->

    <!-- Select langugat starts -->
        <div id="select-language" class="uk-modal">
        <div class="uk-modal-dialog">
            <a class="uk-modal-close uk-close"></a>
            <div class="uk-modal-header">
                <h3 class="uk-text-muted">Select Language</h3>
            </div>
            <div data-uk-button-radio data-uk-margin class="language-modal">
                    <button class="uk-button"><img src="<?php echo base_url(); ?>assets/images/flags/United-states-flag.png" alt="english" class="uk-margin-small-right">English</button>
                    <button class="uk-button uk-button-link"><img src="<?php echo base_url(); ?>assets/images/flags/France-flag.png" alt="french" class="uk-margin-small-right">French</button>
                    <button class="uk-button uk-button-link"><img src="<?php echo base_url(); ?>assets/images/flags/Spain-flag.png" alt="" class="uk-margin-small-right">Spanish</button>
                    <button class="uk-button uk-button-link"><img src="<?php echo base_url(); ?>assets/images/flags/China-flag.png" alt="" class="uk-margin-small-right">Chinese</button>
                    <button class="uk-button uk-button-link"><img src="<?php echo base_url(); ?>assets/images/flags/Denmark.png" alt="" class="uk-margin-small-right">Danish</button>
                    <button class="uk-button uk-button-link"><img src="<?php echo base_url(); ?>assets/images/flags/Japan-flag.png" alt="" class="uk-margin-small-right">Japanese</button>
                    <button class="uk-button uk-button-link"><img src="<?php echo base_url(); ?>assets/images/flags/Russia-flag.png" alt="" class="uk-margin-small-right">Russian</button>
                    <button class="uk-button uk-button-link"><img src="<?php echo base_url(); ?>assets/images/flags/Poland-flag.png" alt="" class="uk-margin-small-right">Polish</button>
                    <button class="uk-button uk-button-link"><img src="<?php echo base_url(); ?>assets/images/flags/Netherlands-flag.png" alt="" class="uk-margin-small-right">Dutch</button>
                    <button class="uk-button uk-button-link"><img src="<?php echo base_url(); ?>assets/images/flags/Portugal-flag.png" alt="" class="uk-margin-small-right">Portuguese</button>
                    <button class="uk-button uk-button-link"><img src="<?php echo base_url(); ?>assets/images/flags/United-arab-emirates.png" alt="" class="uk-margin-small-right">Arabic</button>
                    <button class="uk-button uk-button-link"><img src="<?php echo base_url(); ?>assets/images/flags/United-states-flag.png" alt="" class="uk-margin-small-right">Latin </button>
            </div>
        </div>
    </div>
    <!-- Javascripts
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.3.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/uikit.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/selectric/jquery.selectric.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/components/grid.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/components/form-select.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/components/slideset.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/vegas/vegas.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/language-switcher/jquery-polyglot.language.switcher.js"></script>


    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>

    <!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
<!-- script for validation start---->
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script> 
<script>
jQuery(document).ready(function() {

	jQuery("#user_registeration").validate({
			rules: {
				name: {
					required: true,
					minlength: 5
				},
				password: {
					required: true,
					minlength: 5,
				},
				email: {
					required: true,
				}
			},
			messages: {
				name: {
					required: "Please provide a username",
					minlength: "Your username must be at least 5 characters long"
				},
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
				email: {
					required: "Please enter a e-mail"
				}
				
			}
		});
	
});



</script>
<!-- script for validation end---->

<!--Script for registeration form submit start-->
<script type="text/javascript">
// Ajax post
$(document).ready(function() {
$("#sign-up").click(function(event) {
event.preventDefault();
$('#user_registeration').validate();
if ($('#user_registeration').valid()) // check if form is valid
{
	var user_name = $("#name").val();
	var email = $("#email").val();
	var password = $("#password").val();
	jQuery.ajax({
	type: "POST",
	url: "<?php echo base_url(); ?>" + "admin/user_registeration",
	dataType: 'json',
	data: {name: user_name, password: password, email: email},
	success:function(data){
		if(data['exist'])
		{
			jQuery("#register_sucess").hide();
			jQuery("#email_exist").show();
		}
		else
		{
			jQuery("#email_exist").hide();
			jQuery("#register_sucess").show();
		}
		
	}
	});
}
else 
{
}

});
});
</script><!--Script for registeration form submit end-->
</html>