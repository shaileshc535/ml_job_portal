<?php
  include('../../admin/assets/_dbconnect.php');
  session_start();
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
    $id=$_SESSION['loggedin'];
    # code...
  }
  $limit_per_page = 8;

  $page = "";
  if(isset($_POST["page_no"])){
    $page = $_POST["page_no"];
  }else{
    $page = 1;
  }
  $offset = ($page - 1) * $limit_per_page;
  // <span class='careerfy-resumes-subtitle'>{$row['post']} at <a href='#'>{$row['company_name']}</a></span>
  $q_applicant = "select user_id from job_apply_job_post where company_id='$id'  LIMIT {$offset},{$limit_per_page}";
  $r_applicant = mysqli_query($con, $q_applicant);
  $output= " ";
  $output.="<div>";
    if(mysqli_num_rows( $r_applicant)>0) {
    
     while ($row_a = mysqli_fetch_array($r_applicant)) {

        $a_id = $row_a['user_id'];

        $query = "select * from  job_seeker_details where user_id='$a_id'";
        $run = mysqli_query($con, $query);
      
          $output .='
<ul class="careerfy-row">
  '; while($row=mysqli_fetch_assoc($run)){ 
    $output.="
  <li class='careerfy-column-12 job-list' id='candidate'>
    <div class='careerfy-employer-resumes-wrap'>
      <figure>
        <a href='#' class='careerfy-resumes-thumb'><img src='profile_image/{$row['dp']}'></a>
        <figcaption'
          <h2>
            <a href='#'>{$row['fname']} {$row['lname']}</a>

            <a href='#' class='careerfy-resumes-download'><i class='careerfy-icon careerfy-download-arrow'></i> Download CV</a>
          </h2>
          
          <ul>
            <li>
              <span>Location:</span>
              {$row['city']}, {$row['state']}, {$row['pincode']}
            </li>
            <li>
              <span>Current Salary:</span>
              {$row['salary']}/<small>p.a minimum</small>
            </li>
          </ul>
        </figcaption>
      </figure>
      <ul class='careerfy-resumes-options'>
        <li>
        <a href='candidate-detail.php?u_id={$row['user_id']}'><i class='careerfy-icon careerfy-user-1'></i> View Profile</a>
        </li>

        <li>
          <a href='type=reject&u_id={$row['user_id']}'>Reject</a>
        </li>
      
        <li>
          <a href='employer-dashboard-resumes.php?type=shortlist&u_id={$row['user_id']}&c_id={$id}'>Shortlist</a>
        </li>
      </ul>
    </div>
  </li>
  "; } $output .='
</ul>
';
  }
$output .="</div> <br>";

  $sql_total = "SELECT user_id FROM job_apply_job_post WHERE company_id='$id'";
  $records = mysqli_query($con,$sql_total) or die("Query Unsuccessful.");
  $total_record = mysqli_num_rows($records);
  $total_pages = ceil($total_record/$limit_per_page);

  $output .='<div class="careerfy-pagination-blog" id="pagination">';
  $output .=' <ul class="page-numbers">';
  
  


  for($i=1; $i <= $total_pages; $i++){
      if($i == $page){
        $class_name = "active";
      }else{
        $class_name = "";
      }
      $output .= "
      
  
      <li><a class='page-numbers  {$class_name}'   id='{$i}' href='#'>{$i}</a></li>";
    }
     $output .='</ul>';
    $output .='</div>';
echo $output; 

} else{ echo "
<h2>No Record Found.</h2>
 $id

" ; }
    
?>
