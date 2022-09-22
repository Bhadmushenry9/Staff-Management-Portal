<?php 
    require_once('includes/fetch.php');
    $page_title = 'Add Department - Fresh FM NIgeria Staff Portal';

    $fetch_id = $_GET['id'];

    $run_fetch_query = querydb("SELECT * FROM department WHERE id='$fetch_id'");
    if (mysqli_num_rows($run_fetch_query) > 0) {
        foreach ($run_fetch_query as $get_query_data) {
            $get_dept_name = $get_query_data['dept_name'];
            $get_head_dept_name = $get_query_data['head_dept_name'];
            $get_dept_no = $get_query_data['dept_no'];
            $get_dept_email = $get_query_data['dept_email'];
            $get_dept_details = $get_query_data['dept_details'];
        }
    }

    if (isset($_POST['update_dept'])) {
        $dept_name = $_POST['dept_name'];
        $head_dept_name = $_POST['head_dept_name'];
        $dept_no = $_POST['dept_no'];
        $dept_email = $_POST['dept_email'];
        $dept_details = $_POST['dept_details'];

        if (empty($dept_name)) {
            $errors .= '<li>Kindly Specify the Name of the Department</li>';
        }
        if (empty($head_dept_name)) {
            $errors .= '<li>Kindly Specify the Head of the Department</li>';
        }
        
        if (empty($errors)) {
            $update_dept_query = querydb("UPDATE department SET dept_name='$dept_name', head_dept_name='$head_dept_name', dept_no='$dept_no', dept_email='$dept_email', dept_details='$dept_details' WHERE id='$fetch_id'");
            if($update_dept_query){
                $_SESSION['msg'] = '<div class="alert alert-success">Department Updated Successfully</div>';
                header('location: edit-department.php?id='.$fetch_id);
                exit;
            }
            
        }
        else{
            $_SESSION['msg'] = '<div class="alert alert-danger">We have found the following error(s):'.$errors.'</div>';
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
                                <h4 class="page-title">Edit Department</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="dashboard.php">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Departments</a>
                            </li>
                            <li class="breadcrumb-item active">Edit Department</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Edit</strong> Department</h2>
                            
                        </div>
                        <div class="body">
                            <form method="POST" action="">
                                <?php 
                                    if (isset($_SESSION['msg'])) {
                                        echo $_SESSION['msg'];
                                        unset($_SESSION['msg']);
                                    }
                                ?>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="Department Name"
                                                    value="<?php echo $get_dept_name; ?>" name="dept_name"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="Head Of Department"
                                                    value="<?php echo $get_head_dept_name; ?>" name="head_dept_name"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="Phone"
                                                    Value="<?php echo $get_dept_no; ?>" name="dept_no"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="dept_email" type="email" class="validate form-control"
                                                    placeholder="Email" value="<?php echo $get_dept_email; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               <!--  <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <input type="text" class="form-control datetimepicker" value="12-01-1990"
                                                    placeholder="Starting Date" name="date1" id="date1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" placeholder="Total Employees"
                                                    Value="54" />
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="textarea" placeholder="More About Department" class="form-control no-resize"
                                                    value="<?php echo $get_dept_details; ?>" name="dept_details"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 p-t-20 text-center">
                                    <button type="submit" class="btn btn-primary waves-effect m-r-15" name="update_dept">Update Department</button>
                                </div>
                            </form>
                        </div>
<?php require_once('includes/footer.php'); ?>