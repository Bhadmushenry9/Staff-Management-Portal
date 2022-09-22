<?php 
    require_once('includes/fetch.php');
    $page_title = 'Staff Profile - Fresh FM NIgeria Staff Portal';

    $fetch_id = $_GET['id'];

    $run_fetch_query = querydb("SELECT * FROM permanent_staff WHERE id='$fetch_id'");
    if (mysqli_num_rows($run_fetch_query) > 0) {
      foreach ($run_fetch_query as $get_query_data) {
        $get_staff_id = $get_query_data['staff_id'];
        $get_sname = $get_query_data['sname'];
        $get_fname = $get_query_data['fname'];
        $get_other_name = $get_query_data['other_name'];
        $get_address = $get_query_data['address'];
        $get_gender = $get_query_data['gender'];
        $get_phone_number = $get_query_data['telephone'];
        $get_email = $get_query_data['email'];
        $get_dob = $get_query_data['dob'];
        $get_qdata = $get_query_data['qualification_title'];
        $get_institution = $get_query_data['institution'];
        $get_year = $get_query_data['year_completed'];
        $get_image = $get_query_data['image'];
        $get_job = $get_query_data['job_title'];

      }
    }
    require_once('includes/header.php');
    require_once('includes/nav.php');
    require_once('includes/sidebar.php');
?>
<section style="background-color: #eee;" class="content">
  <div class="container py-5">
    <div class="block-header">
      <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <ul class="breadcrumb breadcrumb-style ">
                  <li class="breadcrumb-item">
                      <h4 class="page-title">Employees</h4>
                  </li>
                  <li class="breadcrumb-item bcrumb-1">
                      <a href="dashboard.php">
                          <i class="fas fa-home"></i> Home</a>
                  </li>
                  <!-- <li class="breadcrumb-item bcrumb-2">
                      <a href="#" onClick="return false;">Employees</a>
                  </li> -->
                  <li class="breadcrumb-item active">Staff Profile</li>
              </ul>
          </div>
      </div>
            </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="<?php echo "assets/img/permanent_staff/".$get_image; ?>" alt="avatar"
              class="rounded-circle img-fluid" style="width: auto; height: auto;">
            <h5 class="my-3"><?php echo $get_sname. ' ' .$get_fname. ' ' .$get_other_name; ?></h5>
            <p class="text-muted mb-1"><?php echo $get_job; ?></p>
            <a href="edit-pstaff.php?id=<?php echo $fetch_id; ?>"><button class="btn btn-info">Edit</button></a>
            <div class="d-flex justify-content-center mb-2">

            </div>
          </div>
        </div>
        
      </div>
      <div class="col-lg-8">
        <h2>Personal Information</h2>
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $get_email; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Contact Number</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $get_phone_number; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Contact Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $get_address ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Gender</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $get_gender; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Date Of Birth</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $get_dob; ?></p>
              </div>
            </div>
          </div>
        </div>
        <h2>Educational Qualification</h2>
        <div class="row">
          <div class="col-md-8">
            <div class="card mb-4 mb-md-0">
              
              <div class="card-body">
                <div class="col-lg-8">
                  <div class="row">
                    <div class="col-sm-6">
                      <p class="mb-0">Qualification Title</p>
                    </div>
                    <div class="col-sm-6">
                      <p class="text-muted mb-0"><?php echo $get_qdata; ?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-6">
                      <p class="mb-0">Institution</p>
                    </div>
                    <div class="col-sm-6">
                      <p class="text-muted mb-0"><?php echo $get_institution; ?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-6">
                      <p class="mb-0">Year Of Completion</p>
                    </div>
                    <div class="col-sm-6">
                      <p class="text-muted mb-0"><?php echo $get_year ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        </div>
      </div>
    </div>
  </div>
</section>
<?php require_once('includes/footer.php'); ?>