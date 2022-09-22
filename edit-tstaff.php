<?php 

    require_once('includes/fetch.php');
    $page_title = 'Update Temporary Staff Profile - Fresh FM Nigeria Staff Portal';

    $errors = "";
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
    if (isset($_POST['update_temporary_staff'])) {
        $staff_surname = $_POST['staff_surname'];
        $staff_first_name = $_POST['staff_first_name'];
        $staff_other_name = $_POST['staff_other_name'];
        $staff_email = $_POST['staff_email'];
        $staff_tel = $_POST['staff_tel'];
        $staff_dob = $_POST['staff_dob'];
        $staff_gender = $_POST['staff_gender'];
        $staff_address = $_POST['staff_address'];
        $staff_contract_title = $_POST['staff_contract_title'];
        $staff_duration_of_stay = $_POST['staff_duration_of_stay'];
        $staff_institution = $_POST['staff_institution'];
        $staff_date_joined = $_POST['staff_date_joined'];
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

                $staff_email_query = querydb("SELECT email FROM temporary_staff WHERE email='$staff_email'");
                $staff_tel_query = querydb("SELECT phone_number FROM temporary_staff WHERE telephone='$staff_tel'");


                if (empty($staff_surname)) {
                    $errors .= '<li>Staff surname is required</li>';
                }
                if (empty($staff_first_name)) {
                    $errors .= '<li>Staff first name is required</li>';
                }
                if (empty($staff_email)) {
                    $errors .= '<li>Staff Email is required</li>';
                }
                if (empty($staff_email)) {
                    $errors .= '<li>Staff Email is required</li>';
                }elseif (mysqli_num_rows($staff_email_query) > 0 && $staff_email != $grab_email) {
                    $errors .= '<li>Staff Email already exist</li>';
                }

                if (empty($staff_tel)) {
                    $errors .= '<li>Staff Phone Number is required</li>';
                }elseif (mysqli_num_rows($staff_tel_query) > 0 && $staff_tel != $grab_phone_number) {
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
                

                if (empty($errors)) {
                    $move_image = move_uploaded_file($_FILES["staff_pic"]["tmp_name"], "assets/img/temporary_staff/".$new_image_name);
                    if ($move_image) {
                        $add_staff_query = querydb("UPDATE temporary_staff
                            SET surname = '$staff_surname', first_name = '$staff_first_name', other_name = '$staff_other_name', address = '$staff_address', phone_number = '$staff_tel', email = '$staff_email', gender = '$staff_gender', dob = '$staff_dob', contract_title = '$staff_contract_title', duration_of_stay = '$staff_duration_of_stay', date_joined = '$staff_date_joined', profile_image = '$new_image_name'");
                    }

                    if($add_staff_query){
                        $_SESSION['msg'] = '<div class="alert alert-success">Staff Record Updated Successfully!</div>';
                        header('location: edit-tstaff.php?id='.$fetch_id);
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

                $staff_email_query = querydb("SELECT email FROM temporary_staff WHERE email='$staff_email'");
                $staff_tel_query = querydb("SELECT phone_number FROM temporary_staff WHERE telephone='$staff_tel'");


                if (empty($staff_surname)) {
                    $errors .= '<li>Staff surname is required</li>';
                }
                if (empty($staff_first_name)) {
                    $errors .= '<li>Staff first name is required</li>';
                }
                if (empty($staff_email)) {
                    $errors .= '<li>Staff Email is required</li>';
                }elseif (mysqli_num_rows($staff_email_query) > 0 && $staff_email != $grab_email) {
                    $errors .= '<li>Staff Email already exist</li>';
                }

                if (empty($staff_tel)) {
                    $errors .= '<li>Staff Phone Number is required</li>';
                }elseif (mysqli_num_rows($staff_tel_query) > 0 && $staff_tel != $grab_phone_number) {
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
                if (empty($staff_contract_title)) {
                    $errors .= '<li>Kindly Specify your Job Title</li>';
                }


                if (empty($errors)) {
                    $add_staff_query = querydb("UPDATE temporary_staff
                            SET surname = '$staff_surname', first_name = '$staff_first_name', other_name = '$staff_other_name', address = '$staff_address', phone_number = '$staff_tel', email = '$staff_email', gender = '$staff_gender', dob = '$staff_dob', contract_title = '$staff_contract_title', duration_of_stay = '$staff_duration_of_stay', date_joined = '$staff_date_joined'");
                                        
                    if($add_staff_query){
                        $_SESSION['msg'] = '<div class="alert alert-success">Staff Record Updated Successfully!</div>';
                        header("location: edit-tstaff.php?id=".$fetch_id);
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
                            <li class="breadcrumb-item active">Edit Staff Profil</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Edit</strong> Temporary Staff Profile
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
                                                <input type="text" class="form-control" placeholder="Surname" name="staff_surname" value="<?php echo $grab_sname; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="First Name" name="staff_first_name" value="<?php echo $grab_fname; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="Other Name" name="staff_other_name" value="<?php echo $grab_other_name; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="staff_email" type="email" class="validate form-control"
                                                    placeholder="Email" value="<?php echo $grab_email; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="staff_tel" type="tel" class="form-control"
                                                    placeholder="Telephone Number" value="<?php echo $grab_phone_number; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Date Of Birth</label>
                                                <input type="date" class="form-control" placeholder="Date of Birth" name="staff_dob" value="<?php echo $grab_dob; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Gender</label>
                                                <select class="form-control" name="staff_gender">
                                                    <option><?php echo $grab_gender; ?></option>
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
                                                    placeholder="Address" name="staff_address" value="<?php echo $grab_address; ?>"></textarea>
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
                                            <input name="staff_pic" type="file" class="form-control" <?php if($grab_image == '') {echo 'required';} ?>/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row"><br><br><br></div>
                                <div class="row clearfix">
                                    <h2>Contract Information</h2>
                                    <div class="row"><br></div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Contract Title</label>
                                                <input type="text" name="staff_contract_title" class="form-control" placeholder="WAEC/NECO/OND/HND/BSC/MSC" value="<?php echo $grab_contract_title; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Duration Of Stay</label>
                                                <input type="text" name="staff_duration_of_stay" class="form-control" value="<?php echo $grab_duration_of_stay; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Date Joined</label>
                                                <input type="text" name="staff_date_joined" class="form-control" value="<?php echo $grab_date_joined; ?>">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-12 p-t-20 text-center">
                                    <button type="update_staff" class="btn btn-success waves-effect m-r-15" name="update_temporary_staff">Update Staff Profile</button>
                                </div>
                            </form>
                        </div>
                        
<?php require_once('includes/footer.php'); ?>