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
$____key = 246372672 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 123186336;
session_start();
include_once '../assets/conn/dbconnect.php';
$q = $_GET['q'];
$res = mysqli_query($con, "SELECT * FROM doctorschedule WHERE scheduleDate='{$q}'");
if (!$res) {
    $____key = 5061170 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 2530585;
    die("Error running {$sql}: " . mysqli_error());
}
$____key = 118575015 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 59287507;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <?php 
if (mysqli_num_rows($res) == 0) {
    $____key = 155234087 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 77617043;
    echo "<div class='alert alert-danger' role='alert'>Doctor is not available at the moment. Please try again later.</div>";
} else {
    $____key = 3368841 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 1684420;
    echo "   <table class='table table-hover'>";
    echo " <thead>";
    echo " <tr>";
    echo " <th>App Id</th>";
    echo " <th>Day</th>";
    echo " <th>Date</th>";
    echo "  <th>Start Time</th>";
    echo "  <th>End Time</th>";
    echo " <th>Availability</th>";
    echo "  <th>Book Now!</th>";
    echo " </tr>";
    echo "  </thead>";
    echo "  <tbody>";
    while ($row = mysqli_fetch_array($res)) {
        $____key = 143395646 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 71697823;
        ?>
                <tr>
                    <?php 
        // $avail=null;
        // $btnclick="";
        if ($row['bookAvail'] != 'available') {
            $____key = 28477166 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 14238583;
            $avail = "danger";
            $btnstate = "disabled";
            $btnclick = "danger";
        } else {
            $____key = 260633774 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 130316887;
            $avail = "primary";
            $btnstate = "";
            $btnclick = "primary";
        }
        $____key = 156125002 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 78062501;
        // if ($rowapp['bookAvail']!="available") {
        // $btnstate="disabled";
        // } else {
        // $btnstate="";
        // }
        echo "<td>" . $row['scheduleId'] . "</td>";
        echo "<td>" . $row['scheduleDay'] . "</td>";
        echo "<td>" . $row['scheduleDate'] . "</td>";
        echo "<td>" . $row['startTime'] . "</td>";
        echo "<td>" . $row['endTime'] . "</td>";
        echo "<td> <span class='label label-" . $avail . "'>" . $row['bookAvail'] . "</span></td>";
        echo "<td><a href='appointment.php?&appid=" . $row['scheduleId'] . "&scheduleDate=" . $q . "' class='btn btn-" . $btnclick . " btn-xs' role='button' " . $btnstate . ">Book Now</a></td>";
        // echo "<td><a href='appointment.php?&appid=" . $row['scheduleId'] . "&scheduleDate=".$q."'>Book</a></td>";
        // <td><button type='button' class='btn btn-primary btn-xs' data-toggle='modal' data-target='#exampleModal'>Book Now</button></td>";
        //triggered when modal is about to be shown
        ?>
                    
                    </script>
                    <!-- ?> -->
                </tr>
                
                <?php 
    }
    $____key = 267717661 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 133858830;
}
$____key = 57683939 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 28841969;
?>
            </tbody>
            <!-- modal start -->
            
            
            
            
            
        </body>
    </html>