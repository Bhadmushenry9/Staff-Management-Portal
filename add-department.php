<?php 
    require_once('includes/fetch.php');
    $page_title = 'Add Department - Fresh FM NIgeria Staff Portal';

    $errors = '';
    
    if (isset($_POST['add_dept'])) {
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
        // if (empty($dept_no)) {
        //     $errors .= '<li>Kindly Specify the Department Contact Number</li>';
        // }
        // if (empty($dept_email)) {
        //     $errors .= '<li>Kindly Specify the Department Email Address</li>';
        // }


        if (empty($errors)) {
            $add_dept_query = querydb("INSERT INTO department(dept_name, head_dept_name, dept_no, dept_email, dept_details) 
                VALUES('$dept_name', '$head_dept_name', '$dept_no', '$dept_email', '$dept_details')");
            $_SESSION['msg'] = '<div class="alert alert-success">Department Added Successfully</div>';
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
                            <h4 class="page-title">Add Department</h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="dashboard.php">
                                <i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item bcrumb-2">
                            <a href="#" onClick="return false;">Departments</a>
                        </li>
                        <li class="breadcrumb-item active">Add Department</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>Add</strong> Department</h2>
                        <!-- <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-bs-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu float-end">
                                    <li>
                                        <a href="javascript:void(0);">Action</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">Another action</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">Something else here</a>
                                    </li>
                                </ul>
                            </li>
                        </ul> -->
                    </div>
                    <div class="body">
                        <form method="POST" action="">
                            <?php 
                                if(isset($_SESSION['msg'])){
                                    echo $_SESSION['msg'];
                                    unset($_SESSION['msg']);
                                }
                            ?>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Department Name" name="dept_name" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Head Of Department" name="head_dept_name" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Phone" name="dept_no" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input id="email" type="email" class="validate form-control"
                                                placeholder="Email" name="dept_email" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize"
                                                placeholder="More About Department" name="dept_details"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Total Employees" name="dept_total_employee" />
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            
                            <div class="col-lg-12 p-t-20 text-center">
                                <button type="submit" class="btn btn-primary waves-effect m-r-15" name="add_dept">Add Department</button>
                            </div>
                        </form>
                    </div>
<?php require_once('includes/footer.php'); ?>