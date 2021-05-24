<?php

// nv == necessary value to reach vul
// vul == vulnerable variable

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Testing Trace Value Checks</title>
	</head>
	<body>
	<?php
	    echo "Starting EVAL <BR>\n";
	    $teststr="123456789";
	    $nv1=$_GET['nv1'];
	    $nv1_len = strlen($nv1);
	    $all_match = TRUE;
        echo " teststr=".strlen($teststr)."\n";
        echo " nv1=".strlen($nv1)."\n";
	    for($i=0; $i < strlen($teststr); $i++){
            if ($i < $nv1_len){
                if ($teststr[$i] == $nv1[$i]){
                    echo "\tmatched #" .$i . " using " . $teststr[$i] . "<BR>\n";
                } else {
                    echo "Matches failed\n";
                    $all_match = FALSE;
                    break;
                }
            } else {
                echo "Matches failed for length\n";
                $all_match = FALSE;
                break;
            }
        }

	    // needs to keep nv1; add nv2 and nv3; and keep vul1

	     if ($all_match){
            echo "CONGRATS!  You found the desired strings <BR>\n";
            include('./config.php');
            $ret=mysqli_query($con,"select * from tblpatient where ID='");
            echo " " . $ret . "<BR>\n";
        }

    ?>
	</body>
</html>