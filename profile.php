<?php 
	require_once('includes/fetch.php');

    $page_title = "Edit Profile - Fresh FM NIgeria Staff Portal";
    $errors = "";
	if (isset($_POST['update'])) {
        
        $admin_name = $_POST['admin_name'];
        $admin_mail = $_POST['admin_mail'];
        $admin_pnumber = $_POST['admin_pnumber'];
        $adminrole = $_POST['adminrole'];
        $admin_pic_name = $_FILES['admin_profile_pic']['name'];
        $admin_pic_size = $_FILES['admin_profile_pic']['size'];

        if($admin_pic_size > 0) {
            //Profile_pic Validation
            $exp = explode(".", $admin_pic_name);
            $extension = strtolower( end($exp) );
            $valid_ext = array("jpg", "jpeg", "png");

            if(!in_array($extension, $valid_ext) ) {
                $errors .= '<li>Invalid file extension! JPEG, JPG, and PNG is required.</li>';
            }
            if($admin_pic_size > 1000000) {
                $errors .= '<li>File is too big. Kindly upload file of 1mb and below.</li>';
            }

            $new_filename = uniqid() . "." . $extension;

            //Phone Number validation
            
            // if ($admin_pnumber != $admin_phone_number) {
            //     $errors .= '<li>Phone Number already exist!</li>';
            // }

            if (empty($errors)) {
                $move_files = move_uploaded_file($_FILES["admin_profile_pic"]["tmp_name"], "assets/img/".$new_filename);
                if ($move_files) {
                    $update_query = querydb("UPDATE admin 
                                         SET full_name='$admin_name', adminnumber='$admin_pnumber', role='$adminrole', admin_profile_pic='$new_filename'
                                        WHERE adminmail='$admin'");
                }

                if($update_query){
                    $_SESSION['msg'] = '<div class="alert alert-success">Profile Updated successful!</div>';
                    header('location: profile.php');
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
        else {

            //Phone Number validation
            // if ($admin_pnumber != $adminnumber) {
            //     $errors .= '<li>Phone Number already exist!</li>';
            // }

            if (empty($errors)) {
                $update_query = querydb("UPDATE admin 
                                     SET full_name='$admin_name', adminnumber='$admin_pnumber', role='$adminrole'
                                    WHERE adminmail='$admin_mail'");
                
                if($update_query){
                    $_SESSION['msg'] = '<div class="alert alert-success">Profile Updated successful!</div>';
                    header('location: profile.php');
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


	require_once ('includes/header.php');
    require_once ('includes/nav.php');
    require_once ('includes/sidebar.php');
 ?>

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title">Profile Settings</h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="dashboard.php">
                                <i class="fas fa-home"></i> Home</a>
                        </li>
                        <!-- <li class="breadcrumb-item bcrumb-2">
                            <a href="#" onClick="return false;">Forms</a>
                        </li> -->
                        <li class="breadcrumb-item active">Profile Settings</li>
                    </ul>
                </div>
            </div>
        </div>
            <!-- Input Group -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>Update</strong> Profile
                        </h2>
        
                    </div>
                    <div class="body">
                        <form method="POST" action="" enctype="multipart/form-data">
                                <!-- <h2 class="card-inside-title">With Icon</h2> -->
                                <?php 
                                    if (isset($_SESSION['msg'])) {
                                        echo $_SESSION['msg'];
                                        unset($_SESSION['msg']);
                                    } 
                                ?>
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <label><h4>Full Name</h4></label>
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="admin_name" value="<?php echo $admin_full_name; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <!-- <h2 class="card-inside-title">With Text</h2> -->
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <label><h4>Email Address</h4></label>
                                        <div class="form-line">
                                            <input type="email" class="form-control" name="admin_mail" value="<?php echo $admin; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                    
                            </div>

                            <div class="row clearfix">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <label><h4>Phone Number</h4></label>
                                        <div class="form-line">
                                            <input type="tel" class="form-control" name="admin_pnumber" value="<?php echo $admin_phone_number; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <label>
                                    <h4>Role</h4>
                                </label>
                                <div class="form-group default-select">
                                    <select class="form-control" name="adminrole">
                                        <option>Head Human Resource</option>
                                        <option>Head of Operations</option>
                                        <option>General Manager</option>
                                        <option>ICT Manager</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="dz-message">
                                    <div class="drag-icon-cph">
                                        <i class="material-icons">touch_app</i>
                                    </div>
                                    <h3>Drop files here or click to upload.</h3>
                                </div>
                        
                                <div class="fallback">
                                    <input name="admin_profile_pic" class="form-control" type="file" <?php if($admin_profile_img == '') {echo 'required';} ?>/>
                                </div>
                            </div>
                            <div class="col-lg-12 p-t-20 text-center">
                                <button type="submit" name="update" class="btn btn-primary waves-effect m-r-15">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


 <?php require_once('includes/footer.php'); ?>