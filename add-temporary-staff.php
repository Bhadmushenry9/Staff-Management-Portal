<?php 
    require_once('includes/fetch.php');
    $page_title = 'Add Temporary Staff - Fresh FM NIgeria Staff Portal';

    $errors = "";
    if (isset($_POST['add_temporary_staff'])) {
        $temporary_staff_surname = $_POST['temporary_staff_surname'];
        $temporary_staff_first_name = $_POST['temporary_staff_first_name'];
        $temporary_staff_other_name = $_POST['temporary_staff_other_name'];
        $temporary_staff_email = $_POST['temporary_staff_email'];
        $temporary_staff_tel = $_POST['temporary_staff_tel'];
        $temporary_staff_dob = $_POST['temporary_staff_dob'];
        $temporary_staff_gender = $_POST['temporary_staff_gender'];
        $temporary_staff_address = $_POST['temporary_staff_address'];
        $contract_title = $_POST['contract_title'];
        $duration_of_contract = $_POST['duration_of_contract'];
        $date_joined = $_POST['date_joined'];
        $temporary_staff_image_name = $_FILES['temporary_staff_image']['name'];
        $temporary_staff_image_size = $_FILES['temporary_staff_image']['size'];


        
        //Staff_pic Validation
        $exp_image = explode(".", $temporary_staff_image_name);
        $confirm_extension = strtolower( end($exp_image) );
        $valid_extension = array("jpg", "jpeg", "png");

        if(!in_array($confirm_extension, $valid_extension) ) {
            $errors .= '<li>Invalid file extension! JPEG, JPG, and PNG is required.</li>';
        }
        if($temporary_staff_image_size > 1000000) {
            $errors .= '<li>File is too big. Kindly upload file of 1mb and below.</li>';
        }

        $temp_staff_image_name = uniqid() . "." . $confirm_extension;

        //QUERY FOR EMAIL AND PHONE NUMBER

        $temporary_staff_email_query = querydb("SELECT email FROM temporary_staff WHERE email='$temporary_staff_email'");
        $temporary_staff_tel_query = querydb("SELECT telephone FROM temporary_staff WHERE telephone='$temporary_staff_tel'");


        if (empty($temporary_staff_surname)) {
            $errors .= '<li>Staff surname is required</li>';
        }
        if (empty($temporary_staff_first_name)) {
            $errors .= '<li>Staff first name is required</li>';
        }
        if (empty($temporary_staff_email)) {
            $errors .= '<li>Staff Email is required</li>';
        }
        if (empty($temporary_staff_email)) {
            $errors .= '<li>Staff Email is required</li>';
        }elseif (mysqli_num_rows($temporary_staff_email_query) > 0) {
            $errors .= '<li>Staff Email already exist</li>';
        }

        if (empty($temporary_staff_tel)) {
            $errors .= '<li>Staff Phone Number is required</li>';
        }elseif (mysqli_num_rows($temporary_staff_tel_query) > 0) {
            $errors .= '<li>Staff Phone Number already exist</li>';
        }

        if (empty($temporary_staff_dob)) {
            $errors .= '<li>Date of Birth is required</li>';
        }
        if (empty($temporary_staff_gender)) {
            $errors .= '<li>Gender is required</li>';
        }
        if (empty($temporary_staff_address)) {
            $errors .= '<li>Address is required</li>';
        }
        if (empty($contract_title)) {
            $errors .= '<li>Kindly Specify your Contract Type</li>';
        }
        if (empty($duration_of_contract)) {
            $errors .= '<li>Kindly Specify your Duration Of Contract</li>';
        }
        if (empty($date_joined)) {
            $errors .= '<li>Kindly Specify your Date Joined</li>';
        }


        if (empty($errors)) {
            $move_temp_image = move_uploaded_file($_FILES["temporary_staff_image"]["tmp_name"], "assets/img/temporary_staff/".$temp_staff_image_name);
            if ($move_temp_image) {
                $add_temp_staff_query = querydb("INSERT INTO temporary_staff(surname, first_name, other_name, dob, address, email, phone_number, gender, contract_title, duration_of_stay, date_joined, profile_image)
                    VALUES ('$temporary_staff_surname', '$temporary_staff_first_name', '$temporary_staff_other_name', '$temporary_staff_dob', '$temporary_staff_address', '$temporary_staff_email', '$temporary_staff_tel', '$temporary_staff_gender', '$contract_title', '$duration_of_contract', '$date_joined', '$temporary_staff_image_name')");
            }

            if($add_temp_staff_query){
                $_SESSION['msg'] = '<div class="alert alert-success">Temporary Staff Record Added Successfully!</div>';
                header('location: add-temporary-staff.php');
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
                            <!-- <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Employees</a>
                            </li> -->
                            <li class="breadcrumb-item active">Add Temporary Staff</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Add</strong> Temporary Staff</h2>
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
                                                <input type="text" class="form-control" placeholder="Surname" name="temporary_staff_surname" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="First Name" name="temporary_staff_first_name" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="Other Name" name="temporary_staff_other_name" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="temporary_staff_email" type="email" class="validate form-control"
                                                    placeholder="Email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="temporary_staff_tel" type="tel" class="form-control"
                                                    placeholder="Telephone Number">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Date Of Birth</label>
                                                <input type="date" class="form-control" placeholder="Date of Birth" name="temporary_staff_dob" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Gender</label>
                                                <select class="form-control" name="temporary_staff_gender">
                                                    <option></option>
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
                                                <textarea rows="4" class="form-control no-resize"
                                                    placeholder="Address" name="temporary_staff_address"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Contract Type</label>
                                                <select class="form-control" name="contract_title">
                                                    <option>Siwes</option>
                                                    <option>Internship</option>
                                                    <option>Corper</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Duration Of Contract</label>
                                                <select class="form-control" name="duration_of_contract">
                                                    <option>3months</option>
                                                    <option>6months</option>
                                                    <option>1year</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Date Joined</label>
                                                <input type="date" name="date_joined" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label class="control-label col-md-3">Upload Your Profile Photo</label>
                                        <div class="dz-message">
                                            <div class="drag-icon-cph">
                                                <i class="material-icons">touch_app</i>
                                            </div>
                                            <h3>Drop files here or click to upload.</h3>
                                                
                                        </div>
                                        <div class="fallback">
                                            <input name="temporary_staff_image" type="file" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12 p-t-20 text-center">
                                    <button type="submit" class="btn btn-primary waves-effect m-r-15" name="add_temporary_staff">Add Temporary Staff</button>
                                </div>
                            </form>
                        </div>
                        
<?php require_once('includes/footer.php'); ?>