<?php

    
    $page_title = 'Dashboard - Fresh FM Nigeria Staff Portal';
    require_once('includes/fetch.php');

    // fopen("test.csv", "w");
    // $file = fopen("test.txt", "w");
    // fwrite($file, "Hello world");
    // fclose($file);

    // $file = fopen("test.txt", "r");
    // echo fread($file,1000000);
    // fclose($file);
    // $file = fopen("test.csv", "w");
    // $content = [
    //     ["Sam", "HND1", "Male"],
    //     ["John", "ND2", "Male"],
    //     ["Marie", "HND2", "Female"]
    // ];

    // if ($file == true) {
    //     fputcsv($file, ["Name", "Class", "Gender"]);
    //     foreach ($content as $data) {
            
    //         fputcsv($file, $data);
    //     }
    // }
    // fclose($file);

    //To Download
    // <a href="" download>Export</a>

    $file = fopen("test.csv", "w");
    $data_query = querydb("SELECT * FROM permanent_staff");
    

    if ($file == true) {
        
        fputcsv($file, ["First Name", "Last Name", "Other Name"]);
        foreach ($data_query as $val) {
            $dt = [ $val['sname'], $val['fname'], $val['other_name'] ];
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
                                <h4 class="page-title">Dashboard</h4>
                            </li>
                            <li class="breadcrumb-item bcrumb-1">
                                <a href="index.html">
                                    <i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-xl-4 col-sm-4">
                    <div class="card l-bg-purple">
                        <div class="info-box-5 p-4">
                            <div class="card-icon card-icon-large"><i class="far fa-users"></i></div>
                            <div class="mb-4">
                                <h5 class="font-20 mb-0">Permanent Staff</h5>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        <?php echo $count_permanent_staff; ?>
                                    </h2>
                                </div>
                                <!-- <div class="col-4 text-end">
                                    <span class="fw-bold">100% <i class="fa fa-arrow-up"></i></span>
                                </div> -->
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="card l-bg-blue-dark">
                        <div class="info-box-5 p-4">
                            <div class="card-icon card-icon-large"><i class="fas fa-users"></i></div>
                            <div class="mb-4">
                                <h5 class="font-20 mb-0">Temporary Staff</h5>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        <?php echo $count_temporary_staff; ?>
                                    </h2>
                                </div>
                                <!-- <div class="col-4 text-end">
                                    <span>5.28% <i class="fa fa-arrow-up"></i></span>
                                </div> -->
                            </div>
                            <!-- <div class="progress mt-1 " data-height="8" style="height: 8px;">
                                <div class="progress-bar l-bg-green" role="progressbar" data-width="25%"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="card l-bg-green-dark">
                        <div class="info-box-5 p-4">
                            <div class="card-icon card-icon-large"><i class="fas fa-tasks"></i></div>
                            <div class="mb-4">
                                <h5 class="font-20 mb-0">Departments</h5>
                            </div>
                            <div class="row align-items-center mb-2 d-flex">
                                <div class="col-8">
                                    <h2 class="d-flex align-items-center mb-0">
                                        10
                                    </h2>
                                </div>
                                <<!-- div class="col-4 text-end">
                                    <span>16% <i class="fa fa-arrow-up"></i></span>
                                </div> -->
                            </div>
                            <!-- <div class="progress mt-1 " data-height="8" style="height: 8px;">
                                <div class="progress-bar l-bg-orange" role="progressbar" data-width="25%"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                
            </div>
            
            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Permanent</strong> Staff</h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Contact Number</th>
                                            <th>Gender</th>
                                            <th>DOB</th>
                                            <th>Job Title</th>
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
                                                     
                                        ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $permanent_staff['sname']. ' ' . $permanent_staff['fname']. ' ' .$permanent_staff['other_name']; ?></td>
                                            <td><?php echo $permanent_staff['email']; ?></td>
                                            <td><?php echo $permanent_staff['telephone']; ?></td>
                                            <td><?php echo $permanent_staff['gender']; ?></td>
                                            <td><?php echo $permanent_staff['dob']; ?></td>
                                            <td><?php echo $permanent_staff['job_title']; ?></td>
                                            <!-- td class="text-truncate">
                                                <ul class="list-unstyled order-list">
                                                    <li class="avatar avatar-sm"><img class="rounded-circle"
                                                            src="assets/images/user/user1.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm"><img class="rounded-circle"
                                                            src="assets/images/user/user2.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm"><img class="rounded-circle"
                                                            src="assets/images/user/user3.jpg" alt="user">
                                                    </li>
                                                    <li class="avatar avatar-sm"><span class="badge">+4</span>
                                                    </li>
                                                </ul>
                                            </td> -->
                                            
                                        </tr>
                                        <?php 
                                            $count++;
                                            }
                                
                                        ?>
                            
                                        <?php } ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <strong>Temporary</strong> Staff</h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table">
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
                                        </tr>
                                        <?php 
                                            $count++;
                                            }
                                    
                                        ?>
                                        <?php } ?>
                                                                        
                                </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                <!-- Browser Usage -->
                
                <!-- #END# Browser Usage -->
            </div>
            

<?php require_once('includes/footer.php'); ?>