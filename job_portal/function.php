<?php
ob_start();
include('../../admin/assets/_dbconnect.php');
?>
<ul class="careerfy-row">
    <?php
    if (isset($_POST['action'])) {

        $query = "SELECT * FROM job_post where status = '0' ";

        if (isset($_POST['vacancy'])) {
            $vacancy_filter = implode("','", $_POST['vacancy']);
            $query .= "AND jobtype in ('" . $vacancy_filter . "')";
        }

        if (isset($_POST['category'])) {
            $category_filter = implode("','", $_POST['category']);
            $query .= "AND job_category in ('" . $category_filter . "')";
        }

        if (isset($_POST['location'])) {
            $location_filter = implode("','", $_POST['location']);
            $query .= "AND state in ('" . $location_filter . "')";
        }

        $run = mysqli_query($con, $query);
        // $result = mysqli_fetch_array($run);
        $count = mysqli_num_rows($run);
        if ($count > 0) {
            while ($row = mysqli_fetch_array($run)) {
    ?>

<li class="careerfy-column-12">
                                            <div class="careerfy-joblisting-classic-wrap">
                                                <figure><a href="#"><img src="<?php echo $path.$row['image'] ?>" alt=""></a></figure>
                                                <div class="careerfy-joblisting-text">
                                                    <div class="careerfy-list-option">
                                                    <!-- Need Senior Rolling Stock Technician -->
                                                        <h2><a href="job-detail-two.php?jid=<?php echo $row['id']?>&status="><?php echo $row['jobtitle'];?></a> <span>Featured</span></h2>
                                                        <ul>
                                                            <li><a href="#">@<?php echo $row['company'];?></a></li>
                                                            <li><i class="careerfy-icon careerfy-maps-and-flags"></i><?php echo $row['state'].",". $row['city'];?></li>
                                                            <li><i class="careerfy-icon careerfy-filter-tool-black-shape"></i> <?php echo $row['jobheading'];?></li>
                                                        </ul>
                                                    </div>
                                                    <div class="careerfy-job-userlist">
                                                        <a href="job-detail-two.php?jid=<?php echo $row['id']?>&status=" class="careerfy-option-btn">Apply</a>
                                                        <!-- <a href="javascript:void(0)" onclick="shortlist_manage('','add')" class="careerfy-job-like"><i class="fa fa-heart"></i></a> -->
                                                      
                                                    </div>
                                      <!-- <div class="clearfix"></div>
                                                </div> -->
                                            </div>
                                        </li>
    <?php
            }
        } else {
            echo "<h3>No Data Found</h3>";
        }
    }
    ?>

</ul>