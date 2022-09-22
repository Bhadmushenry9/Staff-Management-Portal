<?php 
    $page_title = 'All Permanent Staff - Fresh FM NIgeria Staff Portal';
    require_once('includes/fetch.php');

    $file = fopen("Permanent_Staff.csv", "w");
    $data_query = querydb("SELECT * FROM permanent_staff");
    
    if ($file == true) {
        fputcsv($file, ["Staff ID", "Name", "Email", "Phone Number", "Address", "Gender", "D.O.B"]);
        foreach ($data_query as $val) {
            $names = $val['sname']. ' ' .$val['fname']. ' ' .$val['other_name'];
            $dt = [ $val['staff_id'], $names, $val['email'], $val['telephone'], $val['address'], $val['gender'], $val['dob'] ];
            fputcsv($file, $dt);
        }
        
    }
    fclose($file);

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
                            <h4 class="page-title">All Permanent Staff</h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="dashboard.php">
                                <i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item bcrumb-2">
                            <a href="#" onClick="return false;">Employee</a>
                        </li>
                        <li class="breadcrumb-item active">All Permanent Staff</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>All</strong> Permanent Staff
                        </h2>
                        <a href="Permanent_Staff.csv" download><button class="btn btn-success float-end">Export</button></a>
                        
                    </div>
                    
                    <div class="body">
                        <div class="table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="center">S/N</th>
                                        <th class="center"> Full Name </th>
                                        <th class="center"> Email </th>
                                        <th class="center"> Contact Number </th>
                                        <th class="center"> Gender </th>
                                        <th class="center"> DOB </th>
                                        <th class="center">Job Title</th>
                                        <th class="center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                            $count = 1;
                                            //TABLE QUERY
                                            $permanent_staff_tablequery = querydb("SELECT * FROM permanent_staff");
                                            if (mysqli_num_rows($permanent_staff_tablequery) > 0) {
                                                foreach ($permanent_staff_tablequery as $permanent_staff) {
                                                    $display_permanent_staff = $permanent_staff['image'];
                                                    $permanent_staff_id = $permanent_staff['id'];
                                                     
                                        ?>
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo $count; ?></td>
                                            <td class="center"><?php echo $permanent_staff['sname']. ' ' . $permanent_staff['fname']. ' ' .$permanent_staff['other_name']; ?></td>
                                            <td class="center"><?php echo $permanent_staff['email']; ?></td>
                                            <td class="center"><?php echo $permanent_staff['telephone']; ?></td>
                                            <td class="center"><?php echo $permanent_staff['gender']; ?></td>
                                            <td class="center"><?php echo $permanent_staff['dob']; ?></td>
                                            <td class="center"><?php echo $permanent_staff['job_title']; ?></td>
                                            <td>
                                            <a href="edit-pstaff.php?id=<?php echo $permanent_staff_id; ?>"><button class="btn btn-info">Edit</button></a>
                                            <a href="view-pstaff.php?id=<?php echo $permanent_staff_id; ?>"><button class="btn btn-success">View</button></a>
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
                                        <th class="center">S/N</th>
                                        <th class="center"> Full Name </th>
                                        <th class="center"> Email </th>
                                        <th class="center"> Contact Number </th>
                                        <th class="center"> Gender </th>
                                        <th class="center"> DOB </th>
                                        <th class="center">Job Title</th>
                                        <th class="center">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="row justify-content-center mt-4">
                                <div class="col-md-12 text-center">
                                    <?php 
                                        $display_pstaff_query = querydb("SELECT * FROM permanent_staff");
                                        $count_items = mysqli_num_rows($display_pstaff_query);
                                        $pages = ceil($count_items / 10); 
                                        if (isset($_GET['page'])) { 
                                            if ($_GET['page'] <= 1) { ?>
                                                <a class="px-3">Prev</a> <?php
                                            }
                                            else{ ?>
                                                <a href="?page=<?php echo $_GET['page'] - 1; ?>" class="px-3">Prev</a> <?php
                                                                    
                                            }
                                        } 
                                        else{ ?>
                                            <a class="px-3">Prev</a> <?php
                                        }?>
                                        
                                        <?php for ($i=1; $i <= $pages; $i++) { ?>
                                            <a href="?page=<?php echo $i ?>" class="px-3"><?php echo $i; ?></a> <?php
                                        } 
                                        if (isset($_GET['page'])) { 
                                            if ($_GET['page'] >= $pages) { ?>
                                                <a class="px-3">Next</a> <?php
                                            }
                                            else{ ?>
                                                <a href="?page=<?php echo $_GET['page'] + 1; ?>" class="px-3">Next</a> <?php
                                                                    
                                            }
                                        } 
                                        else{ ?>
                                            <a class="px-3">Next</a> <?php
                                        }?>
                                        
                                
                                </div>
                            </div>
                        </div>
                    </div>
<?php require_once('includes/footer.php'); ?>