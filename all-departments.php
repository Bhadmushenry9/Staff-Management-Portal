<?php 
    require_once('includes/fetch.php');
    $page_title = 'Add Department - Fresh FM NIgeria Staff Portal';


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
                                <h4 class="page-title">All Departments</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="dashboard.php">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item bcrumb-2">
                                <a href="#" onClick="return false;">Departments</a>
                            </li>
                            <li class="breadcrumb-item active">All Departments</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>All</strong> Departments
                            </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover js-basic-example contact_list">
                                    <thead>
                                        
                                        <tr>
                                            <th>#</th>
                                            <th class="center">Dept. Name </th>
                                            <th class="center"> Head Of Dept. </th>
                                            <th class="center"> Phone </th>
                                            <th class="center"> Email </th>
                                            <th class="center"> Total Emp. </th>
                                            <th class="center"> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $count = 1;
                                            //TABLE QUERY
                                            $dept_tablequery = querydb("SELECT * FROM department");
                                            if (mysqli_num_rows($dept_tablequery) > 0) {
                                                foreach ($dept_tablequery as $dept) {
                                                    $dept_id = $dept['id'];
                                                     
                                        ?>
                                        <tr class="even">
                                            <td class="center"><?php echo $count; ?></td>
                                            <td class="center"><?php echo $dept['dept_name']; ?></td>
                                            <td class="center"><?php echo $dept['head_dept_name']; ?></td>
                                            <td class="center"><?php echo $dept['dept_no']; ?></td>
                                            <td class="center"><?php echo $dept['dept_email']; ?></td>
                                            <td class="center"></td>
                                            <td class="center">
                                               <a href="edit-department.php?id=<?php echo $dept_id; ?>"><button class="btn btn-success">Edit</button></a>
                                            </td>
                                        </tr>
                                        <?php 
                                            $count++;
                                            }
                                    
                                        ?>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th class="center">Dept. Name </th>
                                            <th class="center"> Head Of Dept. </th>
                                            <th class="center"> Phone </th>
                                            <th class="center"> Email </th>
                                            <th class="center"> Total Emp. </th>
                                            <th class="center"> Action </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
<?php require_once('includes/footer.php'); ?>