<?php

if (!array_key_exists("____instr", $GLOBALS)) {
    $GLOBALS["____instr"]["map"] = array();
    $GLOBALS["____instr"]["prev"] = 0;
    function ____instr_write_map()
    {
        $f = fopen("/var/instr/map." . (isset($_SERVER["HTTP_REQ_ID"]) ? $_SERVER["HTTP_REQ_ID"] : 0), "w+");
        foreach ($GLOBALS["____instr"]["map"] as $k => $v) {
            fwrite($f, $k . "-" . $v . "\n");
        }
        fclose($f);
    }
    register_shutdown_function("____instr_write_map");
}
$____key = 209892720 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 104946360;
session_start();
// include_once '../connection/server.php';
include_once '../assets/conn/dbconnect.php';
if (!isset($_SESSION['patientSession'])) {
    $____key = 24933224 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 12466612;
    header("Location: patientdashboard.php");
}
$____key = 232826927 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 116413463;
$res = mysqli_query($con, "SELECT * FROM patient WHERE icPatient=" . $_SESSION['patientSession']);
$userRow = mysqli_fetch_array($res, MYSQLI_ASSOC);
if (isset($_POST['submit'])) {
    $____key = 107703857 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 53851928;
    //variables
    $patientFirstName = $_POST['patientFirstName'];
    $patientLastName = $_POST['patientLastName'];
    $patientMaritialStatus = $_POST['patientMaritialStatus'];
    $patientDOB = $_POST['patientDOB'];
    $patientGender = $_POST['patientGender'];
    $patientAddress = $_POST['patientAddress'];
    $patientPhone = $_POST['patientPhone'];
    $patientEmail = $_POST['patientEmail'];
    $patientId = $_POST['patientId'];
    // mysqli_query("UPDATE blogEntry SET content = $udcontent, title = $udtitle WHERE id = $id");
    $res = mysqli_query($con, "UPDATE patient SET patientFirstName='{$patientFirstName}', patientLastName='{$patientLastName}', patientMaritialStatus='{$patientMaritialStatus}', patientDOB='{$patientDOB}', patientGender='{$patientGender}', patientAddress='{$patientAddress}', patientPhone={$patientPhone}, patientEmail='{$patientEmail}' WHERE icPatient=" . $_SESSION['patientSession']);
    // $userRow=mysqli_fetch_array($res);
    header('Location: patientprofile.php');
}
$____key = 225903779 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 112951889;
$male = "";
$female = "";
if ($userRow['patientGender'] == 'male') {
    $____key = 55771977 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 27885988;
    $male = "checked";
} elseif ($userRow['patientGender'] == 'female') {
    $____key = 86362735 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 43181367;
    $female = "checked";
}
$____key = 26521127 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 13260563;
$single = "";
$married = "";
$separated = "";
$divorced = "";
$widowed = "";
if ($userRow['patientMaritialStatus'] == 'single') {
    $____key = 249885288 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 124942644;
    $single = "checked";
} elseif ($userRow['patientMaritialStatus'] == 'married') {
    $____key = 266968333 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 133484166;
    $married = "checked";
} elseif ($userRow['patientMaritialStatus'] == 'separated') {
    $____key = 194788929 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 97394464;
    $separated = "checked";
} elseif ($userRow['patientMaritialStatus'] == 'divorced') {
    $____key = 59033982 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 29516991;
    $divorced = "checked";
} elseif ($userRow['patientMaritialStatus'] == 'widowed') {
    $____key = 61049183 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 30524591;
    $widowed = "checked";
}
$____key = 101628822 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 50814411;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Patient Dashboard</title>
        <!-- Bootstrap Core CSS -->
        <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/material.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="assets/css/sb-admin.css" rel="stylesheet">
        <link href="assets/css/date/bootstrap-datepicker.css" rel="stylesheet">
        <link href="assets/css/date/bootstrap-datepicker3.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="patientdashboard.html">Patient Dashboard</a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu message-dropdown">
                            <li class="message-preview">
                                <a href="#">
                                    <div class="media">
                                        <span class="pull-left">
                                            <img class="media-object" src="http://placehold.it/50x50" alt="">
                                        </span>
                                        <div class="media-body">
                                            <h5 class="media-heading">
                                            <strong>John Smith</strong>
                                            </h5>
                                            <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="message-preview">
                                <a href="#">
                                    <div class="media">
                                        <span class="pull-left">
                                            <img class="media-object" src="http://placehold.it/50x50" alt="">
                                        </span>
                                        <div class="media-body">
                                            <h5 class="media-heading">
                                            <strong>John Smith</strong>
                                            </h5>
                                            <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="message-preview">
                                <a href="#">
                                    <div class="media">
                                        <span class="pull-left">
                                            <img class="media-object" src="http://placehold.it/50x50" alt="">
                                        </span>
                                        <div class="media-body">
                                            <h5 class="media-heading">
                                            <strong>John Smith</strong>
                                            </h5>
                                            <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="message-footer">
                                <a href="#">Read All New Messages</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu alert-dropdown">
                            <li>
                                <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                            </li>
                            <li>
                                <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#">View All</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li>
                            <a href="patientdashboard.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li class="active">
                            <a href="patientprofile.php"><i class="fa fa-fw fa-bar-chart-o"></i> Profile</a>
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-fw fa-table"></i> Tables</a>
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a>
                        </li>
                        <li>
                            <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                        </li>
                        <li>
                            <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
                        </li>
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                            <ul id="demo" class="collapse">
                                <li>
                                    <a href="#">Dropdown Item</a>
                                </li>
                                <li>
                                    <a href="#">Dropdown Item</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                        </li>
                        <li>
                            <a href="patientdashboard-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>
            <div id="page-wrapper">
                <div class="container-fluid">
                    
                    <!-- /.row -->
                    <!-- template start -->
                    <div class="container">
                        <div class="row">
                            
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
                                
                                
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h2 class="panel-title"><?php 
echo $userRow['patientFirstName'];
?> <?php 
echo $userRow['patientLastName'];
?></h2>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://placehold.it/250x250" class="img-circle img-responsive"> </div>
                                            
                                            
                                            <div class=" col-md-9 col-lg-9 ">
                                                <form action="<?php 
$_PHP_SELF;
?>" method="post" name="form1" id="form1">
                                                    <table class="table table-user-information">
                                                        <tbody>
                                                            <tr>
                                                                <td>PatientId:</td>
                                                                <td><?php 
echo $userRow['icPatient'];
?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>PatientFirstName:</td>
                                                                <td><input type="text" class="form-control" name="patientFirstName" value="<?php 
echo $userRow['patientFirstName'];
?>"  /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>PatientLastName</td>
                                                                <td><input type="text" class="form-control" name="patientLastName" value="<?php 
echo $userRow['patientLastName'];
?>"  /></td>
                                                            </tr>
                                                            
                                                            <!-- radio button -->
                                                            <tr>
                                                                <td>PatientMaritialStatus:</td>
                                                                <td>
                                                                    <div class="radio">
                                                                        <label><input type="radio" name="patientMaritialStatus" value="single" <?php 
echo $single;
?>>Single</label>
                                                                    </div>
                                                                    <div class="radio">
                                                                        <label><input type="radio" name="patientMaritialStatus" value="married" <?php 
echo $married;
?>>Married</label>
                                                                    </div>
                                                                    <div class="radio">
                                                                        <label><input type="radio" name="patientMaritialStatus" value="separated" <?php 
echo $separated;
?>>Separated</label>
                                                                    </div>
                                                                    <div class="radio">
                                                                        <label><input type="radio" name="patientMaritialStatus" value="divorced" <?php 
echo $divorced;
?>>Divorced</label>
                                                                    </div>
                                                                    <div class="radio">
                                                                        <label><input type="radio" name="patientMaritialStatus" value="widowed" <?php 
echo $widowed;
?>>Widowed</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <!-- radio button end -->
                                                            <tr>
                                                                <td>PatientDOB</td>
                                                                <!-- <td><input type="text" class="form-control" name="patientDOB" value="<?php 
echo $userRow['patientDOB'];
?>"  /></td> -->
                                                                <td>
                                                                    <div class="form-group ">
                                                                        
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon">
                                                                                <i class="fa fa-calendar">
                                                                                </i>
                                                                            </div>
                                                                            <input class="form-control" id="patientDOB" name="patientDOB" placeholder="MM/DD/YYYY" type="text" value="<?php 
echo $userRow['patientDOB'];
?>"/>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <script type="text/javascript">
                                                                $(function () {
                                                                $('#datetimepicker1').datetimepicker();
                                                                });
                                                                </script>
                                                            </tr>
                                                            <!-- radio button -->
                                                            <tr>
                                                                <td>Gender:</td>
                                                                <td>
                                                                    <div class="radio">
                                                                        <label><input type="radio" name="patientGender" value="male" <?php 
echo $male;
?>>Male</label>
                                                                    </div>
                                                                    <div class="radio">
                                                                        <label><input type="radio" name="patientGender" value="female" <?php 
echo $female;
?>>Female</label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <!-- radio button end -->
                                                            <tr>
                                                                <td>PatientAddress</td>
                                                                <td><input type="text" class="form-control" name="patientAddress" value="<?php 
echo $userRow['patientAddress'];
?>"  /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>PatientPhone</td>
                                                                <td><input type="text" class="form-control" name="patientPhone" value="<?php 
echo $userRow['patientPhone'];
?>"  /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>PatientEmail</td>
                                                                <td><input type="text" class="form-control" name="patientEmail" value="<?php 
echo $userRow['patientEmail'];
?>"  /></td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="submit" name="submit" class="btn btn-info" value="Update Info"></td>
                                                                </tr>
                                                            </tbody>
                                                            
                                                        </table>
                                                        
                                                        
                                                        
                                                    </form>
                                                    
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-footer">
                                            <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                                            <span class="pull-right">
                                                <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                                                <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                            </span>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- template end -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /#page-wrapper -->
            </div>
            <!-- /#wrapper -->
            <!-- jQuery -->
            <script src="assets/js/jquery.js"></script>
            <script src="assets/js/date/bootstrap-datepicker.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
            <!-- Bootstrap Core JavaScript -->
            <script src="assets/js/bootstrap.min.js"></script>
            <script>
            $(document).ready(function(){
            var date_input=$('input[name="patientDOB"]'); //our date input has the name "date"
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
            format: 'yyyy/mm/dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
            })
            })
            </script>
            
        </body>
    </html>