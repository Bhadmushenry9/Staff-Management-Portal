<?php 
    require_once('includes/fetch.php');
    $page_title = 'Staff Profile - Fresh FM NIgeria Staff Portal';

   //fetch staff data
    $grab_id = $_GET['id'];
    $grab_fetch_query = querydb("SELECT * FROM temporary_staff WHERE id='$grab_id'");
    if (mysqli_num_rows($grab_fetch_query) > 0) {
      foreach ($grab_fetch_query as $grab_query_data) {
        $grab_sname = $grab_query_data['surname'];
        $grab_fname = $grab_query_data['first_name'];
        $grab_other_name = $grab_query_data['other_name'];
        $grab_address = $grab_query_data['address'];
        $grab_gender = $grab_query_data['gender'];
        $grab_phone_number = $grab_query_data['phone_number'];
        $grab_email = $grab_query_data['email'];
        $grab_dob = $grab_query_data['dob'];
        $grab_contract_title = $grab_query_data['contract_title'];
        $grab_duration_of_stay = $grab_query_data['duration_of_stay'];
        $grab_date_joined = $grab_query_data['date_joined'];
        $grab_image = $grab_query_data['profile_image'];
        
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
                  <li class="breadcrumb-item bcrumb-2">
                      <a href="all-temporary-staff.php" onClick="return false;">All Temporary Staff</a>
                  </li>
                  <li class="breadcrumb-item active">Staff Profile</li>
              </ul>
          </div>
      </div>
            </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="<?php echo "assets/img/temporary_staff/".$grab_image; ?>" alt="avatar"
              class="rounded-circle img-fluid" style="width: auto; height: auto;">
            <h5 class="my-3"><?php echo $grab_sname. ' ' .$grab_fname. ' ' .$grab_other_name; ?></h5>
            <p class="text-muted mb-1"><?php echo $grab_contract_title; ?></p>
            <a href="edit-tstaff.php?id=<?php echo $fetch_id; ?>"><button class="btn btn-info">Edit</button></a>
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
                <p class="text-muted mb-0"><?php echo $grab_email; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Contact Number</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $grab_phone_number; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Contact Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $grab_address ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Gender</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $grab_gender; ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Date Of Birth</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $grab_dob; ?></p>
              </div>
            </div>
          </div>
        </div>
        <h2>Contract Information</h2>
        <div class="row">
          <div class="col-md-8">
            <div class="card mb-4 mb-md-0">
              
              <div class="card-body">
                <div class="col-lg-8">
                  <div class="row">
                    <div class="col-sm-6">
                      <p class="mb-0">Contract Type</p>
                    </div>
                    <div class="col-sm-6">
                      <p class="text-muted mb-0"><?php echo $grab_contract_title; ?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-6">
                      <p class="mb-0">Duration Of Stay</p>
                    </div>
                    <div class="col-sm-6">
                      <p class="text-muted mb-0"><?php echo $grab_duration_of_stay; ?></p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-6">
                      <p class="mb-0">Date Joined</p>
                    </div>
                    <div class="col-sm-6">
                      <p class="text-muted mb-0"><?php echo $grab_date_joined ?></p>
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