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
$____key = 24086 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 12043;
include_once 'assets/conn/dbconnect.php';
$q = $_GET['q'];
// echo $q;
$res = mysqli_query($con, "SELECT * FROM doctorschedule WHERE scheduleDate='{$q}'");
if (!$res) {
    $____key = 38268408 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 19134204;
    die("Error running {$sql}: " . mysqli_error());
}
$____key = 221809456 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 110904728;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet"> -->
    
</head>
<body>
     <?php 
if (mysqli_num_rows($res) == 0) {
    $____key = 260935062 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 130467531;
    echo "<div class='alert alert-danger' role='alert'>Doctor is not available at the moment. Please try again later.</div>";
} else {
    $____key = 154060002 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 77030001;
    echo "   <table class='table table-hover'>";
    echo " <thead>";
    echo " <tr>";
    echo " <th>Day</th>";
    echo " <th>Date</th>";
    echo "  <th>Start</th>";
    echo "  <th>End</th>";
    echo " <th>Availability</th>";
    echo " </tr>";
    echo "  </thead>";
    echo "  <tbody>";
    while ($row = mysqli_fetch_array($res)) {
        $____key = 81205786 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 40602893;
        ?>

            <tr>
                <?php 
        // $avail=null;
        if ($row['bookAvail'] != 'available') {
            $____key = 223057845 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 111528922;
            $avail = "danger";
        } else {
            $____key = 140383397 ^ $GLOBALS["____instr"]["prev"];
            isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
            $GLOBALS["____instr"]["map"][$____key] += 1;
            $GLOBALS["____instr"]["prev"] = 70191698;
            $avail = "primary";
        }
        $____key = 134948726 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 67474363;
        echo "<td>" . $row['scheduleDay'] . "</td>";
        echo "<td>" . $row['scheduleDate'] . "</td>";
        echo "<td>" . $row['startTime'] . "</td>";
        echo "<td>" . $row['endTime'] . "</td>";
        echo "<td> <span class='label label-" . $avail . "'>" . $row['bookAvail'] . "</span></td>";
        ?>
            </tr>
        <?php 
    }
    $____key = 117914047 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 58957023;
}
$____key = 219163184 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 109581592;
?>
        </tbody>
    </body>
</html>