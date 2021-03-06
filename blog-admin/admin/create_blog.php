
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>WildLife Admin-panel  </title>
  
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="../asset/images/log.png">
    <link rel="shortcut icon" href="../asset/images/log.png"> 

    <link rel="stylesheet" href="../asset/css/normalize.css">
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="../asset/css/themify-icons.css">
    <link rel="stylesheet" href="../asset/css/pe-icon-7-filled.css">
    <link rel="stylesheet" href="../asset/css/flag-icon.min.css">
    <link rel="stylesheet" href="../asset/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="../asset/css/bootstrap-select.less"> --> 
    <link rel="stylesheet" href="../asset/css/style.css"> 
 
</head>


<body>
<?php

include "../config/config.php";

    $b_tittle = $_POST['b_tittle'];
    $b_descr = $_POST['b_descr'];
    $b_content = $_POST['b_content'];
    $sub_cat_id = $_POST['sub_cat_id'];

    if(empty($_FILES['profile']['name'])||empty($b_tittle)||empty($b_descr)||empty($b_content)) {
    
        ?>
        <div class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                        <a href="index.php?new_blog"><span class="badge badge-pill badge-danger">Alert</span> You have not filled all fields .
                            <button type="button" class="close"  style="" >
                                <span aria-hidden="true">&times;</span>
                             </button></a>
                        <br>
                    </div>
                </div>
            </div>
        </div>
            
        <?php  
    }
    else
    {
	
        $profile=$_FILES['profile'];
        $file_name = $_FILES['profile']['name'];    
        $file_location = $_FILES['profile']['tmp_name'];
        $new_file_name = "$file_name";
        
        if(move_uploaded_file($file_location, "../../blog_photo/" . $new_file_name)){
                            
            $sql="INSERT INTO wp_blog(sub_cat_id,blog_tittle,blog_descr,blog_content,blog_photo)
                VALUES('$sub_cat_id','$b_tittle','$b_descr','$b_content','$new_file_name')";
    
                    if ($conn->query($sql)==TRUE) 
                    {
                        ?>
                        <div class="content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                        <a href="index.php?new_blog"><span class="badge badge-pill badge-success">Done</span> You have succeffuly Created new Blog .
                                            <button type="button" class="close"  style="" >
                                                <span aria-hidden="true">&times;</span>
                                             </button></a>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                        <a href="index.php?new_blog"><span class="badge badge-pill badge-danger">Alert</span> Sorry Something went wrong. Please try again .
                                            <button type="button" class="close"  style="" >
                                                <span aria-hidden="true">&times;</span>
                                             </button></a>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
        }
    }

?>
    <script src="../asset/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="../asset/js/popper.min.js"></script>
    <script src="../asset/js/plugins.js"></script>
    <script src="../asset/js/main.js"></script>



    <!--Flot Chart-->

    <script src="../asset/js/lib/flot-chart/jquery.flot.js"></script>
    <script src="../asset/js/lib/flot-chart/jquery.flot.spline.js"></script>

    <script src="../asset/js/widgets.js"></script>


    <script src="../asset/js/lib/data-table/datatables.min.js"></script>
    <script src="../asset/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="../asset/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="../asset/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <!-- <script src="../asset/js/lib/data-table/jszip.min.js"></script>
    <script src="../asset/js/lib/data-table/pdfmake.min.js"></script> -->
    <script src="../asset/js/lib/data-table/vfs_fonts.js"></script>
    <script src="../asset/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="../asset/js/lib/data-table/buttons.print.min.js"></script>
    <script src="../asset/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="../asset/js/lib/data-table/datatables-init.js"></script>

        <!--  Chart js -->
    <script src="../js/princeop.js"></script>
    <script src="../js/check.js"></script>
    <script src='../js/jspdf.min.js'></script>
</body>
</html>