<?php 
    $page_title = 'All Permanent Staff - Fresh FM NIgeria Staff Portal';
    require_once('includes/fetch.php');

    $file = fopen("Temporary_Staff.csv", "w");
    $data_query = querydb("SELECT * FROM temporary_staff");
    
    if ($file == true) {
        fputcsv($file, ["Name", "Email", "Phone Number", "Gender", "Contract Title", "Duration Of Stay", "Date Joined"]);
        foreach ($data_query as $val) {
            $names = $val['surname']. ' ' .$val['first_name']. ' ' .$val['other_name'];
            $dt = [ $names, $val['email'], $val['phone_number'], $val['gender'], $val['contract_title'], $val['duration_of_stay'], $val['date_joined'] ];
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
                        <a href="Temporary_Staff.csv" download><button class="btn btn-success float-end">Export</button></a>
                        
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
                                        <th class="center"> Contract Type </th>
                                        <th class="center">Duration Of Stay</th>
                                        <th class="center">Date Joined</th>
                                        <th class="center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                            $count = 1;
                                            //TABLE QUERY
                                            $temporary_staff_tablequery = querydb("SELECT * FROM temporary_staff");
                                            if (mysqli_num_rows($temporary_staff_tablequery) > 0) {
                                                foreach ($temporary_staff_tablequery as $temporary_staff) {
                                                    $display_temporary_staff = $temporary_staff['profile_image'];
                                                    $temporary_staff_id = $temporary_staff['id'];
                                                     
                                        ?>
                                        <tr>
                                            <td class="center"><?php echo $count; ?></td>
                                            <td class="center"><?php echo $temporary_staff['surname']. ' ' . $temporary_staff['first_name']. ' ' .$temporary_staff['other_name']; ?></td>
                                            <td class="center"><?php echo $temporary_staff['email']; ?></td>
                                            <td class="center"><?php echo $temporary_staff['phone_number']; ?></td>
                                            <td class="center"><?php echo $temporary_staff['gender']; ?></td>
                                            <td class="center"><?php echo $temporary_staff['contract_title']; ?></td>
                                            <td class="center"><?php echo $temporary_staff['duration_of_stay']; ?></td>
                                            <td class="center"><?php echo $temporary_staff['date_joined']; ?></td>
                                            <td>
                                                <a href="edit-tstaff.php?id=<?php echo $temporary_staff_id; ?>"><button class="btn btn-info">Edit</button></a>
                                                <a href="view-tstaff.php?id=<?php echo $temporary_staff_id; ?>">
                                                <button class="btn btn-success">View</button></a>
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
                                        <th class="center"> Contract Type </th>
                                        <th class="center">Duration Of Stay</th>
                                        <th class="center">Date Joined</th>
                                        <th class="center">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="row justify-content-center mt-4">
                                <div class="col-md-12 text-center">
                                    <?php 
                                        $display_tstaff_query = querydb("SELECT * FROM temporary_staff");
                                        $count_items = mysqli_num_rows($display_tstaff_query);
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