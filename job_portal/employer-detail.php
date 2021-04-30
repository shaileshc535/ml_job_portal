<?php
session_start();
ob_start();
include 'include/header-log.php';
include '../admin/assets/_dbconnect.php';
include '../admin/assets/_functions.php';

$msg = '';




//check wether the id is set or not
if (isset($_GET['id'])) {
    // get the id & all othr details
    $id = $_GET['id'];
    // $industry_type_id = $_GET['industry_type_id'];
    // $job_func_area_id = $_GET['job_func_area_id'];
    // $company_name = $_GET['company_name'];
    // $country = $_GET['country'];
    // $state = $_GET['state'];
    // $city = $_GET['city'];
    // $pincode = $_GET['pincode'];
    // $address = $_GET['address'];
    // $contact_number = $_GET['contact_number'];
    // $website = $_GET['website'];
    // $email = $_GET['email'];
    // $team_size = $_GET['team_size'];
    // $about_us = $_GET['about_us'];
    // $logo = $_GET['logo'];

    //create sql query
    $sql = "SELECT * FROM  job_company WHERE id=$id";

    //execute the query
    $res = mysqli_query($con, $sql);

    //count the roe to check wether id is valid or not
    $count = mysqli_num_rows($res);

    if ($count == 1) {
        //get all the data
        $row = mysqli_fetch_assoc($res);
        $industry_type_id = $row['industry_type_id'];
        $job_func_area_id = $row['job_func_area_id'];
        $company_name = $row['company_name'];
        $country = $row['country'];
        $state = $row['state'];
        $city = $row['city'];
        $pincode = $row['pincode'];
        $address = $row['address'];
        $contact_number = $row['contact_number'];
        $website = $row['website'];
        $email = $row['email'];
        $team_size = $row['team_size'];
        $about_us = $row['about_us'];
        $logo = $row['logo'];
    } else {
        //redirect to manage_brand with message
        $_SESSION['no-brand-found'] = "<div class='error'>Category Not Found.</div>";
        header('location:' . $SITEURL . 'job_portal/employer-dashboard.php');
    }
} else {
    //redirect to manage_category page
    header('location:' . $SITEURL . 'job_portal/signin.php');
}


?>

<div id="app">
    <div class="fixed-list">
        <ul class="nav" id="init-scrollspy">
            <li data-tooltip="tooltip" data-placement="left" title="Calculator">
                <a href="#" class="nav-link" id="calculate"><i class="fas fa-calculator"></i></a>
            </li>
            <li data-tooltip="tooltip" data-placement="left" title="Unit Converter">
                <a class="nav-link"><i class="fas fa-drafting-compass"></i></a>
            </li>
            <li data-tooltip="tooltip" data-placement="left" title="Money Converter">
                <a class="nav-link"><i class="fas fa-rupee-sign"></i></a>
            </li>
            <li data-tooltip="tooltip" data-placement="left" title="AR / Coming Soon">
                <a class="nav-link"><i class="fas fa-vr-cardboard"></i></a>
            </li>
            <li data-tooltip="tooltip" data-placement="left" title="VR / Coming Soon">
                <a class="nav-link"><i class="fas fa-vr-cardboard"></i></a>
            </li>
            <li data-tooltip="tooltip" data-placement="left" title="Vastu / Coming Soon">
                <a class="nav-link"><i class="fas fa-star-of-david"></i></a>
            </li>
        </ul>
    </div>

    <!-- SubHeader -->
    <div class="careerfy-job-subheader">
        <span class="careerfy-banner-transparent"></span>
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                </div>
            </div>
        </div>
    </div>
    <!-- SubHeader -->

    <!-- Main Content -->
    <div class="careerfy-main-content">

        <!-- Main Section -->
        <div class="careerfy-main-section">
            <div class="container">
                <div class="row">

                    <!-- Job Detail List -->
                    <div class="careerfy-column-12 careerfy-typo-wrap">
                        <figure class="careerfy-jobdetail-list">
                            <span class="careerfy-jobdetail-listthumb"><img
                                    src="extra-images/employer-detail-logo-1.png" alt=""></span>
                            <figcaption>
                                <!-- <small class="careerfy-rating-info">4.5</small> -->
                                <div class="careerfy-rating"><small class="careerfy-rating-box width-ninetwo"></small>
                                </div>
                                <h2><?php echo $company_name; ?></h2>
                                <ul class="careerfy-jobdetail-options">
                                    <li><i class="fa fa-map-marker"></i> <?php echo $address; ?> </li>
                                    <li><i class="careerfy-icon careerfy-internet"></i> <a
                                            href="#"><?php echo $website; ?></a></li>
                                    <li><i class="careerfy-icon careerfy-mail"></i> <a href="#">Email:
                                            <?php echo $email; ?></a></li>
                                    <li><i class="careerfy-icon careerfy-technology"></i> Hotline:
                                        <?php echo $contact_number; ?></li>
                                </ul>
                                <a href="#" class="careerfy-employerdetail-btn">Follow</a>
                                <a href="#" class="careerfy-employerdetail-btn"><i
                                        class="careerfy-icon careerfy-add"></i> Add a
                                    review</a>

                            </figcaption>
                        </figure>
                    </div>
                    <!-- Job Detail List -->

                    <!-- Job Detail Content -->
                    <div class="careerfy-column-8 careerfy-typo-wrap">
                        <div class="careerfy-jobdetail-content careerfy-employerdetail-content">
                            <div class="careerfy-content-title">
                                <h2><?php echo $company_name; ?> Overview</h2>
                            </div>
                            <div class="careerfy-jobdetail-services">
                                <ul class="careerfy-row">
                                    <li class="careerfy-column-4">
                                        <i class="careerfy-icon careerfy-group"></i>
                                        <div class="careerfy-services-text">Company Size
                                            <small><?php echo $team_size; ?></small>
                                        </div>
                                    </li>
                                    <li class="careerfy-column-4">
                                        <i class="careerfy-icon careerfy-briefcase"></i>
                                        <div class="careerfy-services-text">Posted Jobs <small>15</small></div>
                                    </li>
                                    <li class="careerfy-column-4">
                                        <i class="careerfy-icon careerfy-view"></i>
                                        <div class="careerfy-services-text">Viewed <small>124</small></div>
                                    </li>
                                    <li class="careerfy-column-4">
                                        <i class="careerfy-icon careerfy-folder"></i>
                                        <div class="careerfy-services-text">Categories <small>Arts, Design, and
                                                Media</small></div>
                                    </li>
                                    <li class="careerfy-column-4">
                                        <i class="careerfy-icon careerfy-time"></i>
                                        <div class="careerfy-services-text">Founded <small>2014</small></div>
                                    </li>
                                    <li class="careerfy-column-4">
                                        <i class="careerfy-icon careerfy-credit-card"></i>
                                        <div class="careerfy-services-text">Revenue <small>$5 billion (USD) per
                                                year</small></div>
                                    </li>
                                </ul>
                            </div>
                            <div class="careerfy-content-title">
                                <h2><?php echo $company_name; ?> Company Description</h2>
                            </div>
                            <div class="careerfy-description">
                                <p><?php echo $about_us; ?>.</p>
                                <!-- <ul class="careerfy-list-style-icon">
                                    <li><i class="careerfy-icon careerfy-arrows22"></i> Lorem ipsum dolor sit amet,
                                        consectetur adipiscing elit.</li>
                                    <li><i class="careerfy-icon careerfy-arrows22"></i> Pellentesque augue dignissim
                                        venenatis, turpis vestibulum lacinia dignissim venenatis.</li>
                                    <li><i class="careerfy-icon careerfy-arrows22"></i> Mus arcu euismod ad hac dui,
                                        vivamus platea netus.</li>
                                    <li><i class="careerfy-icon careerfy-arrows22"></i> Neque per nisl posuere sagittis,
                                        id platea dui.</li>
                                    <li><i class="careerfy-icon careerfy-arrows22"></i> A enim magnis dapibus, nullam
                                        odio porta, nisl class.</li>
                                    <li><i class="careerfy-icon careerfy-arrows22"></i> Turpis leo pellentesque per nam,
                                        nostra fringilla id.</li>
                                </ul> -->
                            </div>
                        </div>
                        <div class="careerfy-employer-wrap-section">
                            <div class="careerfy-content-title careerfy-addmore-space">
                                <h2>Office Photos</h2>
                            </div>
                            <div class="careerfy-gallery careerfy-simple-gallery">
                                <ul class="careerfy-row grid">
                                    <li class="grid-item careerfy-column-3"> <a
                                            href="extra-images/employer-gallery-2.jpg" class="fancybox"
                                            data-fancybox-group="group"><img src="extra-images/employer-gallery-1.jpg"
                                                alt=""></a> </li>
                                    <li class="grid-item careerfy-column-6"> <a
                                            href="extra-images/employer-gallery-2.jpg" class="fancybox"
                                            data-fancybox-group="group"><img src="extra-images/employer-gallery-2.jpg"
                                                alt=""></a> </li>
                                    <li class="grid-item careerfy-column-3"> <a
                                            href="extra-images/employer-gallery-2.jpg" class="fancybox"
                                            data-fancybox-group="group"><img src="extra-images/employer-gallery-3.jpg"
                                                alt=""></a> </li>
                                    <li class="grid-item careerfy-column-3"> <a
                                            href="extra-images/employer-gallery-2.jpg" class="fancybox"
                                            data-fancybox-group="group"><img src="extra-images/employer-gallery-4.jpg"
                                                alt=""></a> </li>
                                    <li class="grid-item careerfy-column-3"> <a
                                            href="extra-images/employer-gallery-2.jpg" class="fancybox"
                                            data-fancybox-group="group"><img src="extra-images/employer-gallery-5.jpg"
                                                alt=""></a> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="careerfy-employer-wrap-section careerfy-margin-bottom">
                            <div class="careerfy-content-title careerfy-addmore-space">
                                <h2>Company Review</h2>
                            </div>
                            <div class="careerfy-company-review">
                                <ul class="careerfy-row">
                                    <li class="careerfy-column-12">
                                        <figure>
                                            <a href="#" class="company-review-thumb"><img
                                                    src="extra-images/company-review-1.jpg" alt=""></a>
                                            <figcaption>
                                                <div class="careerfy-company-review-left">
                                                    <h6><a href="#">Gloria E. Larsen</a></h6>
                                                    <div class="careerfy-company-rating"><span
                                                            class="careerfy-company-rating-box width-eighty"></span>
                                                    </div>
                                                    <small>4.0</small>
                                                </div>
                                                <time datetime="2008-02-14 20:00">September 25, 2017</time>
                                            </figcaption>
                                        </figure>
                                        <div class="careerfy-company-review-text">
                                            <h6><a href="#">“Color sit amet, consectetur adipiscing elit”</a></h6>
                                            <p>Goodness some froze the sullen much connected bat wonderfully on
                                                instantaneously eel valiantly petted this along across highhandedly much
                                                neutral lazy reset.</p>
                                        </div>
                                    </li>
                                    <li class="careerfy-column-12">
                                        <figure>
                                            <a href="#" class="company-review-thumb"><img
                                                    src="extra-images/company-review-2.jpg" alt=""></a>
                                            <figcaption>
                                                <div class="careerfy-company-review-left">
                                                    <h6><a href="#">Gloria E. Larsen</a></h6>
                                                    <div class="careerfy-company-rating"><span
                                                            class="careerfy-company-rating-box width-eighty"></span>
                                                    </div>
                                                    <small>4.0</small>
                                                </div>
                                                <time datetime="2008-02-14 20:00">September 25, 2017</time>
                                            </figcaption>
                                        </figure>
                                        <div class="careerfy-company-review-text">
                                            <h6><a href="#">“Color sit amet, consectetur adipiscing elit”</a></h6>
                                            <p>Goodness some froze the sullen much connected bat wonderfully on
                                                instantaneously eel valiantly petted this along across highhandedly much
                                                neutral lazy reset.</p>
                                        </div>
                                    </li>
                                    <li class="careerfy-column-12">
                                        <figure>
                                            <a href="#" class="company-review-thumb"><img
                                                    src="extra-images/company-review-3.jpg" alt=""></a>
                                            <figcaption>
                                                <div class="careerfy-company-review-left">
                                                    <h6><a href="#">Gloria E. Larsen</a></h6>
                                                    <div class="careerfy-company-rating"><span
                                                            class="careerfy-company-rating-box width-eighty"></span>
                                                    </div>
                                                    <small>4.0</small>
                                                </div>
                                                <time datetime="2008-02-14 20:00">September 25, 2017</time>
                                            </figcaption>
                                        </figure>
                                        <div class="careerfy-company-review-text">
                                            <h6><a href="#">“Color sit amet, consectetur adipiscing elit”</a></h6>
                                            <p>Goodness some froze the sullen much connected bat wonderfully on
                                                instantaneously eel valiantly petted this along across highhandedly much
                                                neutral lazy reset.</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="careerfy-section-title">
                            <h2>Active Jobs From Essentra Components</h2>
                        </div>
                        <div class="careerfy-job careerfy-joblisting-classic careerfy-jobdetail-joblisting">
                            <ul class="careerfy-row">
                                <li class="careerfy-column-12">
                                    <div class="careerfy-joblisting-classic-wrap">
                                        <figure><a href="#"><img src="extra-images/job-listing-logo-1.png" alt=""></a>
                                        </figure>
                                        <div class="careerfy-joblisting-text">
                                            <div class="careerfy-list-option">
                                                <h2><a href="#">Need Senior Rolling Stock Technician</a>
                                                    <span>Featured</span>
                                                </h2>
                                                <ul>
                                                    <li><a href="#">@ Massimo Artemisis</a></li>
                                                    <li><i class="careerfy-icon careerfy-maps-and-flags"></i>
                                                        Netherlands, Rotterdam</li>
                                                    <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i>
                                                        Sales & Marketing</li>
                                                </ul>
                                            </div>
                                            <div class="careerfy-job-userlist">
                                                <a href="#" class="careerfy-option-btn">Freelance</a>
                                                <a href="#" class="careerfy-job-like"><i class="fa fa-heart"></i></a>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </li>
                                <li class="careerfy-column-12">
                                    <div class="careerfy-joblisting-classic-wrap">
                                        <figure><a href="#"><img src="extra-images/job-listing-logo-2.png" alt=""></a>
                                        </figure>
                                        <div class="careerfy-joblisting-text">
                                            <div class="careerfy-list-option">
                                                <h2><a href="#">Job in Computer Information Tech</a></h2>
                                                <ul>
                                                    <li><a href="#">@ Sapient</a></li>
                                                    <li><i class="careerfy-icon careerfy-maps-and-flags"></i>
                                                        Netherlands, Rotterdam</li>
                                                    <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i>
                                                        Development</li>
                                                </ul>
                                            </div>
                                            <div class="careerfy-job-userlist">
                                                <a href="#" class="careerfy-option-btn careerfy-blue">Full time</a>
                                                <a href="#" class="careerfy-job-like"><i class="fa fa-heart"></i></a>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </li>
                                <li class="careerfy-column-12">
                                    <div class="careerfy-joblisting-classic-wrap">
                                        <figure><a href="#"><img src="extra-images/job-listing-logo-3.png" alt=""></a>
                                        </figure>
                                        <div class="careerfy-joblisting-text">
                                            <div class="careerfy-list-option">
                                                <h2><a href="#">Website Information Officer Required</a></h2>
                                                <ul>
                                                    <li><a href="#">@ Mindshare</a></li>
                                                    <li><i class="careerfy-icon careerfy-maps-and-flags"></i>
                                                        Netherlands, Rotterdam</li>
                                                    <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i>
                                                        Telecommunication</li>
                                                </ul>
                                            </div>
                                            <div class="careerfy-job-userlist">
                                                <a href="#" class="careerfy-option-btn careerfy-red">Temporary</a>
                                                <a href="#" class="careerfy-job-like"><i class="fa fa-heart"></i></a>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </li>
                                <li class="careerfy-column-12">
                                    <div class="careerfy-joblisting-classic-wrap">
                                        <figure><a href="#"><img src="extra-images/job-listing-logo-4.png" alt=""></a>
                                        </figure>
                                        <div class="careerfy-joblisting-text">
                                            <div class="careerfy-list-option">
                                                <h2><a href="#">Junior Support Engineer VBA</a> <span>Featured</span>
                                                </h2>
                                                <ul>
                                                    <li><a href="#">@ Disneyland</a></li>
                                                    <li><i class="careerfy-icon careerfy-maps-and-flags"></i>
                                                        Netherlands, Rotterdam</li>
                                                    <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i>
                                                        Food Services</li>
                                                </ul>
                                            </div>
                                            <div class="careerfy-job-userlist">
                                                <a href="#" class="careerfy-option-btn">Freelance</a>
                                                <a href="#" class="careerfy-job-like"><i class="fa fa-heart"></i></a>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </li>
                                <li class="careerfy-column-12">
                                    <div class="careerfy-joblisting-classic-wrap">
                                        <figure><a href="#"><img src="extra-images/job-listing-logo-5.png" alt=""></a>
                                        </figure>
                                        <div class="careerfy-joblisting-text">
                                            <div class="careerfy-list-option">
                                                <h2><a href="#">Technology Senior Officer Norway Office</a></h2>
                                                <ul>
                                                    <li><a href="#">@ LK Collections</a></li>
                                                    <li><i class="careerfy-icon careerfy-maps-and-flags"></i>
                                                        Netherlands, Rotterdam</li>
                                                    <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i>
                                                        Health Care</li>
                                                </ul>
                                            </div>
                                            <div class="careerfy-job-userlist">
                                                <a href="#" class="careerfy-option-btn careerfy-green">Part time</a>
                                                <a href="#" class="careerfy-job-like"><i class="fa fa-heart"></i></a>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Job Detail Content -->
                    <!-- Job Detail SideBar -->
                    <aside class="careerfy-column-4 careerfy-typo-wrap">
                        <div class="widget widget_contact_form">
                            <div class="careerfy-widget-title">
                                <h2>Contact Form</h2>
                            </div>
                            <form>
                                <ul>    
                                    <li>
                                        <label>User Name:</label>
                                        <input value="Enter Your Name"
                                            onblur="if(this.value == '') { this.value ='Enter Your Name'; }"
                                            onfocus="if(this.value =='Enter Your Name') { this.value = ''; }"
                                            type="text">
                                        <i class="careerfy-icon careerfy-user"></i>
                                    </li>
                                    <li>
                                        <label>Email Address:</label>
                                        <input value="Enter Your Email Address"
                                            onblur="if(this.value == '') { this.value ='Enter Your Email Address'; }"
                                            onfocus="if(this.value =='Enter Your Email Address') { this.value = ''; }"
                                            type="text">
                                        <i class="careerfy-icon careerfy-mail"></i>
                                    </li>
                                    <li>
                                        <label>Phone Number:</label>
                                        <input value="Enter Your Phone Number"
                                            onblur="if(this.value == '') { this.value ='Enter Your Phone Number'; }"
                                            onfocus="if(this.value =='Enter Your Phone Number') { this.value = ''; }"
                                            type="text">
                                        <i class="careerfy-icon careerfy-technology"></i>
                                    </li>
                                    <li>
                                        <label>Message:</label>
                                        <textarea>After using Big Interview, I now feel much more confident about handling real interviews. I really liked the recording & playback functionality, which allowed me to hear my voice and analyze the strength and confidence of my answer.</textarea>
                                    </li>
                                    <li> <img src="extra-images/widget-contact-captcha.jpg" alt=""> </li>
                                    <li>
                                        <input type="submit" value="Send now">
                                        <p>You accepts our <a href="#">Terms and Conditions</a></p>
                                    </li>
                                </ul>
                            </form>
                        </div>
                        <div class="widget jobsearch_widget_map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d22589232.038285658!2d-103.9763543971716!3d46.28054447273778!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1507595834401"></iframe>
                        </div>
                        <div class="widget widget_add">
                            <img src="extra-images/jobdetail-add.jpg" alt="">
                        </div>
                    </aside>
                    <!-- Job Detail SideBar -->

                </div>
            </div>
        </div>
        <!-- Main Section -->

    </div>
    <!-- Main Content -->
    <?php include 'include/footer.php' ?>