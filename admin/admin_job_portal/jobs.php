<?php
include('includes/_header.php');
include_once('includes/common.php');
$common = new Common();
$allCountries = $common->getCountries($con);

?>

<div class="dashboard-wrapper">
  <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content">
      <h1>Add/Create Job Posts</h1>

      <form method="post" action="jobs.php" enctype="multipart/form-data">
        <div class="form-group">
          <label for="formGroupExampleInput">Job Category</label>
          <input type="text" class="form-control" id="search" name="jobtitle">
        </div>

        <div class="form-group">
          <label for="formGroupExampleInput">Job Title</label>
          <input type="text" class="form-control" name="heading" id="formGroupExampleInput">
        </div>
        <!-- <div id="Categorylist">
          </div> -->
        <div class="form-group">
          <label for="formGroupExampleInput">Company Name</label>
          <input type="text" class="form-control" name="companyname" id="formGroupExampleInput">
        </div>

        <div class="form-group">
          <label class="form-label" for="customFile">Logo</label>
          <input type="file" class="form-control" name="image" id="customFile" />
        </div>


        <div class="form-group purple-border">
          <label for="exampleFormControlTextarea4">Job Description</label>
          <textarea class="form-control" id="exampleFormControlTextarea4" name="j_desc" rows="3"></textarea>
        </div>

        <div class="form-group purple-border">
          <label for="exampleFormControlTextarea4">Perks</label>
          <textarea class="form-control" id="exampleFormControlTextarea4" name="j_perks" rows="3"></textarea>
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput">Job Type</label>
          <select class="form-control" size="1" name="type">
               <option value="">Type</option>
               <option value="Intership">Intership</option>
               <option value="Full Time">Full Time</option>
               <option value="Part Time">Part Time</option>

           </select>
        </div>
        <div class="form-row">
        <div class="form-group col-md-3">
                                        <label for="country">Country</label>
                                        <select type="text" name="country" id="countryId" size="1" class="form-control"
                                            onchange="getStatesByCountry();">
                                            <option value="">Country</option>
                                            <?php
                                            if ($allCountries->num_rows > 0) {
                                                while ($country = $allCountries->fetch_object()) {
                                                    $countryId = $country->id;
                                                    $countryName = $country->name; ?>
                                            <option value="<?php echo $countryId; ?>"><?php echo $countryName; ?>
                                            </option>
                                            <?php }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="state">State</label>
                                        <select class="form-control" size="1" name="state" id="stateId"
                                            onchange="getCityByState();">
                                            <option value="">State</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="city">City</label>
                                        <select class="form-control" size="1" name="city" id="cityDiv">
                                            <option value="">City</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control">
          </div>
          </div>

        
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="number">Stipend</label>
            <input type="text" name="stipend" class="form-control">
          </div>
          <div class="form-group col-md-3">
            <label for="number">Salary</label>
            <input type="text" name="salary" class="form-control">
          </div>
          <div class="form-group col-md-3">
            <label for="quantity">Experience(in Year)</label>
            <input type="number" class="form-control" name="exp" min="0" max="8">
          </div>
          <div class="form-group col-md-3">
            <label for="quantity">Number Of Openings</label>
            <input type="number" class="form-control" name="openings" min="0" max="8">
          </div>
        </div>
        <div class="form-group purple-border">
          <label for="exampleFormControlTextarea4">Skills Required</label>
          <textarea class="form-control" name="wca" id="exampleFormControlTextarea4" rows="3"></textarea>
        </div>
        <input class="btn btn-primary" type="submit" value="Post Job" name="submit">
        <!-- <button type="button" class="btn btn-primary btn-lg btn-block" name="submit">Post Job</button> -->

      </form>  
</div>   
    <?php
        if(isset($_POST['submit'])){
          $stateId = $_POST['state'];
          $cityId =  $_POST['city'];
          $select1 = mysqli_query($con,"SELECT * FROM states WHERE id=$stateId");          
          $res = mysqli_fetch_array($select1);                 
          $title = $_POST['jobtitle'];
          $j_heading = $_POST['heading'];

          $file_name = $_FILES['image']['name'];
          $file_size =$_FILES['image']['size'];
          $file_tmp =$_FILES['image']['tmp_name'];
          $file_type=$_FILES['image']['type'];

          move_uploaded_file($file_tmp,"img/.$file_name");

          
          $cname = $_POST['companyname'];
          $desc = $_POST['j_desc'];
          $perks = $_POST['j_perks'];
          $email = $_POST['email'];
          $j_type = $_POST['type'];
          $stipend = $_POST['stipend'];
          $salary = $_POST['salary'];
          $state = $res['name'];
          $city =$_POST['city'];
          $exp = $_POST['exp'];
          $openings = $_POST['openings'];
          $wca = $_POST['wca'];
          $query = "INSERT INTO `job_post` (`company`, `jobtitle`, `email`, `description`,  `perks`, `jobtype`, `state`, `city`, `stipend`, `salary`, `experience`, `openings`, `qualification`, `createdat`, `image`, `jobheading`) VALUES ('$cname', '$title', '$email', '$desc','$perks','$j_type','$state','$city', '$stipend', '$salary', '$exp', '$openings', '$wca', current_timestamp(), '$file_name', '$j_heading' )";
          $run = mysqli_query($con,$query);
          
    if($run){
        // header("Location:./jobs.php"); 
       echo" <div class='alert alert-primary' role='alert'>
         Job is Added
        </div>";
        exit;        
    }
    else{
      echo" <div class='alert alert-danger' role='alert'>
      Job is not Added
     </div>";
    }
}
?>
 
    <script>
      function getStatesByCountry() {
        var countryId = $("#countryId").val();
        $.post("includes/ajax.php", {
          getStatesByCountry: 'getStatesByCountry',
          countryId: countryId
        }, function (response) {
          // alert(response);
          var data = response.split('^');
          var stateData = data[1];
          $("#stateId").html(stateData);
        });
      }

      function getCityByState() {
        var stateId = $("#stateId").val();
        $.post("includes/ajax.php", {
          getCityByState: 'getCityByState',
          stateId: stateId
        }, function (response) {
          // alert(response);
          var data = response.split('^');
          var cityData = data[1];
          $("#cityDiv").html(cityData);
        });
      }
    </script>
    <?php
            
            include('includes/_footer.php');
        ?>