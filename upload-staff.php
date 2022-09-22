<?php
	
	require_once('includes/fetch.php'); 
	$page_title = 'Upload Staff Record - Fresh FM Nigeria Staff Portal';

	$errors = '';
	if (isset($_POST['upload_pstaff'])) {
		$pstaff_record_upload = $_FILES['pstaff_record_upload']['name'];

		$expd = explode('.', $pstaff_record_upload);
		$check_exten = strtolower( end($expd) );
        $validate_exten = array("csv");

        if ($pstaff_record_upload = '') {
        	$errors = '<li>File cannot be empty</li>';
        }

        if(!in_array($check_exten, $validate_exten)){
        	$errors = '<li>Invalid File Extension! CSV only is required</li>';
        }

        $filename = uniqid() . "." . $check_exten;

        if (empty($errors)) {
        	$move_files = move_uploaded_file($_FILES["pstaff_record_upload"]["tmp_name"], "assets/csv/permanent_staff/".$filename);

        	$file = fopen($filename, "r");
    		
    
    		if ($file == true) {
    			$data = fgetcsv($file);
    			$name = $data[0];
                $matric = $data[1];
                $insert_query = querydb("INSERT INTO text_db(name, matric_no) VALUES('$name', '$matric')");

                $_SESSION['msg'] = '<div class="alert alert-success">Data Added Successfully</div>';
        		// fputcsv($file, ["Staff ID", "Name", "Email", "Phone Number", "Address", "Gender", "D.O.B"]);
        		// foreach ($data_query as $val) {
          //   	$names = $val['sname']. ' ' .$val['fname']. ' ' .$val['other_name'];
          //   	$dt = [ $val['staff_id'], $names, $val['email'], $val['telephone'], $val['address'], $val['gender'], $val['dob'] ];
          //   	fputcsv($file, $dt);
        	}
            fclose($file);
        }
        else{
            $_SESSION['msg'] = '<div class="alert alert-danger">We have found the following error(s): <ul>' .$errors.'</ul></div>';
        }
        
    }



	require_once('includes/header.php');
	require_once('includes/nav.php');
	require_once('includes/sidebar.php');

?>
<section class="content">
	<div class="container">
        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">
                        <li class="breadcrumb-item">
                            <h4 class="page-title">Upload Permanent Staff Record</h4>
                        </li>
                        <li class="breadcrumb-item bcrumb-1">
                            <a href="dashboard.php">
                                <i class="fas fa-home"></i> Home</a>
                        </li>
                        <!-- <li class="breadcrumb-item bcrumb-2">
                            <a href="#" onClick="return false;">Forms</a>
                        </li> -->
                        <li class="breadcrumb-item active">Upload Record</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>Upload</strong> Permanent Staff Record
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
					            <div class="dz-message">
					            	<div class="drag-icon-cph">
					                	<i class="material-icons">touch_app</i>
					                </div>
					                <h3>Drop files here or click to upload.</h3>
					            </div>
					                        
					            <div class="fallback">
					                <input name="pstaff_record_upload" class="form-control" type="file" />
					            </div>
					        </div>

					        <div class="col-lg-12 p-t-20 text-center">
                                <button type="submit" name="upload_pstaff" class="btn btn-primary waves-effect m-r-15">Upload Record</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php require_once('includes/footer.php'); ?>