<?php 

    require_once('includes/fetch.php');
    $page_title = 'Edit Permanent Staff Profile - Fresh FM NIgeria Staff Portal';

    $errors = "";
    if (isset($_POST['update_permanent_staff'])) {
        $staff_id = $_POST['staff_id'];
        $staff_surname = $_POST['staff_surname'];
        $staff_first_name = $_POST['staff_first_name'];
        $staff_other_name = $_POST['staff_other_name'];
        $staff_email = $_POST['staff_email'];
        $staff_tel = $_POST['staff_tel'];
        $staff_dob = $_POST['staff_dob'];
        $staff_gender = $_POST['staff_gender'];
        $staff_address = $_POST['staff_address'];
        $staff_job_title = $_POST['staff_job_title'];
        $staff_qualification_title = $_POST['staff_qualification_title'];
        $staff_institution = $_POST['staff_institution'];
        $staff_year_completed = $_POST['staff_year_completed'];
        $staff_pic_name = $_FILES['staff_pic']['name'];
        $staff_pic_size = $_FILES['staff_pic']['size'];


        
        //Staff_pic Validation
        if($staff_pic_size > 0) {
            $split = explode(".", $staff_pic_name);
            $check_extension = strtolower( end($split) );
            $validate_extension = array("jpg", "jpeg", "png");

                if(!in_array($check_extension, $validate_extension) ) {
                $errors .= '<li>Invalid file extension! JPEG, JPG, and PNG is required.</li>';
                }
                if($staff_pic_size > 1000000) {
                    $errors .= '<li>File is too big. Kindly upload file of 1mb and below.</li>';
                }

                $new_image_name = uniqid() . "." . $check_extension;

                //QUERY FOR ID, EMAIL AND PHONE NUMBER

                $staff_id_query = querydb("SELECT staff_id FROM permanent_staff WHERE staff_id='$staff_id'");
                $staff_email_query = querydb("SELECT email FROM permanent_staff WHERE email='$staff_email'");
                $staff_tel_query = querydb("SELECT telephone FROM permanent_staff WHERE telephone='$staff_tel'");


                if (empty($staff_id)) {
                    $errors .= '<li>Staff ID is required</li>';
                }if (mysqli_num_rows($staff_id_query) > 0 && $staff_id != $get_staff_id) {
                    $errors .= '<li>Staff ID already exist</li>';
                }

                if (empty($staff_surname)) {
                    $errors .= '<li>Staff surname is required</li>';
                }
                if (empty($staff_first_name)) {
                    $errors .= '<li>Staff first name is required</li>';
                }
                if (empty($staff_email)) {
                    $errors .= '<li>Staff Email is required</li>';
                }elseif (mysqli_num_rows($staff_email_query) > 0 && $staff_email != $get_email) {
                    $errors .= '<li>Staff Email already exist</li>';
                }

                if (empty($staff_tel)) {
                    $errors .= '<li>Staff Phone Number is required</li>';
                }elseif (mysqli_num_rows($staff_tel_query) > 0 && $staff_tel != $get_phone_number) {
                    $errors .= '<li>Staff Phone Number already exist</li>';
                }

                if (empty($staff_dob)) {
                    $errors .= '<li>Date of Birth is required</li>';
                }
                if (empty($staff_gender)) {
                    $errors .= '<li>Gender is required</li>';
                }
                if (empty($staff_address)) {
                    $errors .= '<li>Address is required</li>';
                }
                if (empty($staff_job_title)) {
                    $errors .= '<li>Kindly Specify your Job Title</li>';
                }


                if (empty($errors)) {
                    $move_image = move_uploaded_file($_FILES["staff_pic"]["tmp_name"], "assets/img/permanent_staff/".$new_image_name);
                    if ($move_image) {
                        $add_staff_query = querydb("UPDATE permanent_staff
                            SET staff_id = '$staff_id', sname = '$staff_surname', fname = '$staff_first_name', other_name = '$staff_other_name', address = '$staff_address', telephone = '$staff_tel', email = '$staff_email', gender = '$staff_gender', dob = '$staff_dob', qualification_title = '$staff_qualification_title', institution = '$staff_institution', year_completed = '$staff_year_completed', image = '$new_image_name', job_title = '$staff_job_title'");
                    }

                    if($add_staff_query){
                        $_SESSION['msg'] = '<div class="alert alert-success">Staff Record Updated Successfully!</div>';
                        header('location: edit-pstaff.php?id='.$fetch_id);
                        exit;
                    }
                    else{
                        $_SESSION['msg'] = '<div class="alert alert-danger">Ooops Something went wrong, Try Again!</div>';
                    }
                                 
                }
                else{
                    $_SESSION['msg'] = '<div class="alert alert-danger">We have found the following error(s):' .$errors.'</div>';
                }
        }

        else{
            //QUERY FOR ID, EMAIL AND PHONE NUMBER

                $staff_id_query = querydb("SELECT staff_id FROM permanent_staff WHERE staff_id='$staff_id'");
                $staff_email_query = querydb("SELECT email FROM permanent_staff WHERE email='$staff_email'");
                $staff_tel_query = querydb("SELECT telephone FROM permanent_staff WHERE telephone='$staff_tel'");


                if (empty($staff_id)) {
                    $errors .= '<li>Staff ID is required</li>';
                }if (mysqli_num_rows($staff_id_query) > 0 && $staff_id != $get_staff_id) {
                    $errors .= '<li>Staff ID already exist</li>';
                }

                if (empty($staff_surname)) {
                    $errors .= '<li>Staff surname is required</li>';
                }
                if (empty($staff_first_name)) {
                    $errors .= '<li>Staff first name is required</li>';
                }
                if (empty($staff_email)) {
                    $errors .= '<li>Staff Email is required</li>';
                }elseif (mysqli_num_rows($staff_email_query) > 0 && $staff_email != $get_email) {
                    $errors .= '<li>Staff Email already exist</li>';
                }

                if (empty($staff_tel)) {
                    $errors .= '<li>Staff Phone Number is required</li>';
                }elseif (mysqli_num_rows($staff_tel_query) > 0 && $staff_tel != $get_phone_number) {
                    $errors .= '<li>Staff Phone Number already exist</li>';
                }

                if (empty($staff_dob)) {
                    $errors .= '<li>Date of Birth is required</li>';
                }
                if (empty($staff_gender)) {
                    $errors .= '<li>Gender is required</li>';
                }
                if (empty($staff_address)) {
                    $errors .= '<li>Address is required</li>';
                }
                if (empty($staff_job_title)) {
                    $errors .= '<li>Kindly Specify your Job Title</li>';
                }


                if (empty($errors)) {
                    $add_staff_query = querydb("UPDATE permanent_staff
                            SET staff_id = '$staff_id', sname = '$staff_surname', fname = '$staff_first_name', other_name = '$staff_other_name', address = '$staff_address', telephone = '$staff_tel', email = '$staff_email', gender = '$staff_gender', dob = '$staff_dob', qualification_title = '$staff_qualification_title', institution = '$staff_institution', year_completed = '$staff_year_completed', job_title = '$staff_job_title'");
                    
                    if($add_staff_query){
                        $_SESSION['msg'] = '<div class="alert alert-success">Staff Record Updated Successfully!</div>';
                        header("location: edit-pstaff.php?id=".$fetch_id);
                        exit;
                    }
                    else{
                        $_SESSION['msg'] = '<div class="alert alert-danger">Ooops Something went wrong, Try Again!</div>';
                    }
                                 
                }
                else{
                    $_SESSION['msg'] = '<div class="alert alert-danger">We have found the following error(s):' .$errors.'</div>';
                }

        }
        
    }

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
    
    <section class="content">
        <div class="container-fluid">
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
                            <li class="breadcrumb-item active">Edit Staff Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Edit</strong> Permanent Staff Profile
                            </h2>
                        </div>
                        <div class="body">
                            <h2>
                                <strong>Personal</strong> Information <br>
                            </h2>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <?php 
                                    if (isset($_SESSION['msg'])) {
                                        echo $_SESSION['msg'];
                                        unset($_SESSION['msg']);
                                    }
                                ?>
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="staff_id" placeholder="Staff ID" class="form-control" value="<?php echo $get_staff_id; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="Surname" name="staff_surname" value="<?php echo $get_sname; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="First Name" name="staff_first_name" value="<?php echo $get_fname; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="Other Name" name="staff_other_name" value="<?php echo $get_other_name; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="staff_email" type="email" class="validate form-control"
                                                    placeholder="Email" value="<?php echo $get_email; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="staff_tel" type="tel" class="form-control"
                                                    placeholder="Telephone Number" value="<?php echo $get_phone_number; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Date Of Birth</label>
                                                <input type="date" class="form-control" placeholder="Date of Birth" name="staff_dob" value="<?php echo $get_dob; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Gender</label>
                                                <select class="form-control" name="staff_gender">
                                                    <option><?php echo $get_gender; ?></option>
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control no-resize"
                                                    placeholder="Address" name="staff_address" value="<?php echo $get_address; ?>"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Job Title</label>
                                                <input type="text" name="staff_job_title" placeholder="OAP/Studio Manager/ICT Manager/e.t.c" value="<?php echo $get_job; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="control-label col-md-3">Upload Your Profile Photo</label>
                                        <div class="dz-message">
                                            <div class="drag-icon-cph">
                                                <i class="material-icons">touch_app</i>
                                            </div>
                                            <h3>Drop files here or click to upload.</h3>
                                                
                                        </div>
                                        <div class="fallback">
                                            <input name="staff_pic" type="file" class="form-control" <?php if($get_image == '') {echo 'required';} ?>/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row"><br><br><br></div>
                                <div class="row clearfix">
                                    <h2>Highest Educational Qualification</h2>
                                    <div class="row"><br></div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Qualification Title</label>
                                                <input type="text" name="staff_qualification_title" class="form-control" placeholder="WAEC/NECO/OND/HND/BSC/MSC" value="<?php echo $get_qdata; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Institution/Training Provider</label>
                                                <input type="text" name="staff_institution" class="form-control" value="<?php echo $get_institution; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Year Completed</label>
                                                <input type="text" name="staff_year_completed" class="form-control" value="<?php echo $get_year; ?>">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-12 p-t-20 text-center">
                                    <button type="update_staff" class="btn btn-success waves-effect m-r-15" name="update_permanent_staff">Update Staff Profile</button>
                                </div>
                            </form>
                        </div>
                        
<?php require_once('includes/footer.php'); ?>