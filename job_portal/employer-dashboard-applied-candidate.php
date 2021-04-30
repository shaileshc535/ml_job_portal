<?php
session_start();
ob_start();
include 'include/header-log.php';
include '../admin/assets/_dbconnect.php';
include '../admin/assets/_functions.php';

$msg = '';
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header('location:' . $SITEURL . 'job_portal/signin.php');
    exit;
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
} else {
    $loggedin = false;
}

if (isset($_SESSION['loggedin'])) {
    $id = $_SESSION['loggedin'];
    $query = "SELECT * FROM  job_company WHERE user_id='$id'";
    $res = mysqli_query($con, $query);
    $res1 = mysqli_fetch_array($res);
?>
<!-- Header -->

<!-- SubHeader -->
<div class="careerfy-subheader careerfy-subheader-without-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="careerfy-page-title">
                    <h1>Companies</h1>
                    <p>Thousands of prestigious employers for you, search for a recruiter right now.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="careerfy-breadcrumb">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="employer-dashboard-applied-candidate.php">Pages</a></li>
            <li>Candidates</li>
        </ul>
    </div>
</div>
<!-- SubHeader -->

<!-- Main Content -->
<div class="careerfy-main-content">

    <!-- Main Section -->
    <div class="careerfy-main-section careerfy-top-full">
        <div class="container">
            <div class="row">

                <aside class="careerfy-column-3">
                    <div class="careerfy-typo-wrap">
                        <div class="careerfy-employer-dashboard-nav">
                            <figure>
                                <a href="#" class="employer-dashboard-thumb"><img
                                        src="extra-images/<?php echo $res1['logo']; ?>" alt=""></a>
                                <figcaption>
                                    <div class="careerfy-fileUpload">
                                        <span><i class="careerfy-icon careerfy-add"></i> Upload Photo</span>
                                        <input type="file" class="careerfy-upload" />
                                    </div>
                                    <h2><?php echo $res1['company_name']; ?></h2>
                                </figcaption>
                            </figure>
                            <ul>
                                <li><a href="employer-dashboard.php"><i class="careerfy-icon careerfy-user"></i>
                                        Company Profile</a></li>
                                <li><a href="employer-manage-jobs.php"><i
                                            class="careerfy-icon careerfy-briefcase-1"></i> Manage Jobs</a></li>

                                <li class="active"><a href="employer-dashboard-applied-candidate.php"><i
                                            class="careerfy-icon careerfy-heart"></i> Applied Candidates</a></li>

                                <li><a href="employer-dashboard-resumes.php"><i
                                            class="careerfy-icon careerfy-heart"></i> Shortlisted Resumes</a></li>

                                <li><a href="employer-dashboard-newjob.php"><i class="careerfy-icon careerfy-plus"></i>
                                        Post a New Job</a></li>

                                <li><a href="employer-dashboard-changed-password.php?id=<?php echo $id; ?>"><i
                                            class="careerfy-icon careerfy-multimedia"></i> Change Password</a>
                                </li>

                                <li><a href="signout.php"><i class="careerfy-icon careerfy-logout"></i> Logout</a></li>
                                <!-- <li><a href="employer-manage-jobs.php"><i class="careerfy-icon careerfy-alarm"></i> Job
                                        Alerts</a></li> -->
                                <!-- <li><a href="employer-dashboard-packages.php"><i class="careerfy-icon careerfy-credit-card-1"></i> Packages</a></li> -->
                                <!-- <li><a href="employer-dashboard-transactions.php"><i class="careerfy-icon careerfy-salary"></i> Transactions</a></li> -->
                            </ul>
                        </div>
                    </div>
                </aside>

                <div class="careerfy-column-9">
                    <div class="careerfy-typo-wrap">
                        <div class="careerfy-employer-dasboard">
                            <div class="careerfy-employer-box-section">
                                <!-- Profile Title -->
                                <div class="careerfy-profile-title">
                                    <h2>Applicants</h2>
                                    <form class="careerfy-employer-search">
                                        <input value="Search orders"
                                            onblur="if(this.value == '') { this.value ='Search orders'; }"
                                            onfocus="if(this.value =='Search orders') { this.value = ''; }" type="text">
                                        <input type="submit" value="">
                                        <i class="careerfy-icon careerfy-search"></i>
                                    </form>
                                </div>
                                <!-- Resumes -->
                                <div class="careerfy-employer-resumes">
                                    <ul class="careerfy-row" id="table-data" >
                                       
                                    </ul>
                                </div>
                                <!-- Pagination -->
                                
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Main Section -->

</div>
<!-- Main Content -->
<script type="text/javascript">
  $(document).ready(function() {
    function loadTable(page){
      $.ajax({
        url: "pagination/appliedCandidatesPagination.php",
        type: "POST",
        data: {page_no :page },
        success: function(data) {
          $("#table-data").html(data)
        }
      });
    }
    loadTable();

    //Pagination Code
    $(document).on("click","#pagination a",function(e) {
      e.preventDefault();
      var page_id = $(this).attr("id");

      loadTable(page_id);
    })
  });
</script>
<!-- Footer -->
<?php
    include 'include/footer.php';
}
?>