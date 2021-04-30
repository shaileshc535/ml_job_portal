<?php
include('includes/_header.php');
$type=get_safe_value($con,$_GET['type']);
if($type=='download'){
    $id=get_safe_value($con, $_GET['id']);
    $select=mysqli_query($con, "SELECT * FROM job_seeker_details WHERE id='$id'");
    $res=mysqli_fetch_array($select);
    $file="assets/files/".$res['resume'];

    // $filename= basename($res['resume']);
    
    // if(file_exists($file)){
    //     header('Content-Type: application/pdf');
    //     header('Content-Disposition: inline; filename=$filename');
    //     header('Expires: 0');
    //     header('Cache-Control: public');
    //     header('Content-Transfer-Encoding: Binary');
    //     header('Content-Length: '.filesize($file));
    //     ob_clean();
    //     flush();
    //     readfile('assets\files\sample.pdf');
    //     exit;
        
    // }
}
?>

<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <h1>Candidate Details</h1>
        </div>
        
        <div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <!-- <div class="col-md-4">
                        <div class="profile-img">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                            
                        </div>
                    </div> -->
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                       <?php
                                                
                                            echo $res['fname'].' '.$res['lname'];


                                       ?>
                                    </h5>
                                    <!-- <h6>
                                        Web Developer and Designer
                                    </h6> -->
                                    <!-- <p class="proile-rating">RANKINGS : <span>8/10</span></p> -->
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="personal-tab" data-toggle="tab" href="#personal_details" role="tab" aria-controls="home" aria-selected="true">Prsonal Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " id="educational-tab" data-toggle="tab" href="#educational_details" role="tab" aria-controls="profile" aria-selected="true">Educational Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="experience-tab" data-toggle="tab" href="#experience_details" role="tab" aria-controls="profile" aria-selected="false">Experience</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="project-tab" data-toggle="tab" href="#project_details" role="tab" aria-controls="profile" aria-selected="false">Training/Project</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        
                        <button type="submit" class="view_portfolio btn" name="view_portfolio" ><a href="<?php echo $file; ?>" target="_blank">View Portfolio</a></button>
                      
                        </div>
                </div>
                <div class="row">
                   
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="personal_details" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6" >
                                                <label >User Id:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <!-- <p>Kshiti123</p> -->
                                            </div>
                                        </div>
                                        <!-- <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>Kshiti Ghelani</p>
                                            </div>
                                        </div> -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $res['email_id'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $res['mobile'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Date Of Birth</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $res['dob'];?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>City</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $res['city'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>State</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $res['state'];?></p>
                                            </div>
                                        </div>   
                            </div>
                            <div class="tab-pane fade" id="educational_details" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>College</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $res['bachelor_college'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Degree</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $res['bachelor'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Stream</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $res['bachelor_stream'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Percentage | Passing Year</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $res['bachelor_percentage']."% | ".$res['bachelor_batch'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Sacadory School</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $res['ssc_school'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Sacadory Stream</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $res['ssc_stream'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Sacadory Percentage | Year</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $res['ssc_percentage']."% | ".$res['ssc_batch'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Skills</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $res['key_skill'];?></p>
                                            </div>
                                        </div>
                                <!-- <div class="row">
                                    <div class="col-md-12">
                                        <label>Your Bio</label><br/>
                                        <p>Your detail description</p>
                                    </div>
                                </div> -->
                            </div>
                            <div class="tab-pane fade" id="experience_details" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Job Profile</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $res['job_profile'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Organization</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $res['job_org'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Start Date | End Date</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $res['job_start_date'].' | '.$res['job_end_date'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Description</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $res['job_desc'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Internship Profile</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $res['internship_profile'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Organization</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $res['internship_org'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Start Date | End Date</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $res['internship_start_date'].' | '.$res['internship_end_date'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Description</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $res['internship_desc'];?></p>
                                            </div>
                                        </div>
                                        
                                <!-- <div class="row">
                                    <div class="col-md-12">
                                        <label>Your Bio</label><br/>
                                        <p>Your detail description</p>
                                    </div>
                                </div> -->
                            </div>
                            <div class="tab-pane fade" id="project_details" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Training/Course name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $res['training_name'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Organization</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $res['training_org'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Start Date | End Date</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $res['training_start_date'].' | '.$res['training_end_date'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Project Title</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $res['project_name'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Start Date | End Date</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $res['project_start_date'].' | '.$res['project_end_date'];?></p>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Description</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $res['project_desc'];?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Project Link</label>
                                            </div>
                                            <div class="col-md-6">
                                            
                                                <a target="_blank" href="<?php echo $res['project_link'];?>"><?php echo $res['project_link'];?></a>
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>About</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $res['aboutme'];?></p>
                                            </div>
                                        </div>
                                        
                                        
                                <!-- <div class="row">
                                    <div class="col-md-12">
                                        <label>Your Bio</label><br/>
                                        <p>Your detail description</p>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
        
        <?php
        include('includes/_footer.php');
        ?>