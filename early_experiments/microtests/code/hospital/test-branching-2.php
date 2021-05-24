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
	function validValues() {
	    if($_GET['nv6'] == "find shortcut here") {
	        echo "Level 4 short-cut achieved, you are TRUE enlightened<BR>\n";
	        return TRUE;
	    }
        $numerical_val = $_GET['nv5'];
	    if($numerical_val == "update" )  {
            echo "Level 4 achieved, you are TRUE enlightened<BR>\n";
            return TRUE;
        } else {
            echo "level 4 failed, you are not the won<BR>\n";
        }


        return FALSE;
    }

	    // needs to keep nv1; add nv2 and nv3; and keep vul1
	    echo "Starting EVAL <BR>\n";
        if($_GET['nv1'] == "1") {
            if (validValues()){
                echo "CONGRATS!  Now that you are enlightened we will bestow on you the most important lesson in life<BR>\n";
                include('./config.php');
                $ret=mysqli_query($con,"select * from tblpatient where ID='");
                echo " " . $ret . "<BR>\n";
            }
        } elseif ($_GET['nv1'] == "2") {
            if (validValues()){
                echo "You did great, but brunch will never help you reach TRUE enlightenment.<BR>\n";
            }
        } elseif ($_GET['nv1'] == "3") {
            if (validValues()){
                echo "You did great, but lunch will never help you reach TRUE enlightenment.<BR>\n";
            }
        } elseif ($_GET['nv1'] == "4") {
            if (validValues()){
                echo "You did great, but a snack will never help you reach TRUE enlightenment.<BR>\n";
            }
        } elseif ($_GET['nv1'] == "5") {
            if (validValues()){
                echo "You did great, but a dinner will never help you reach TRUE enlightenment.<BR>\n";
            }
        } else {
            echo "You didn't eat? You'll never reach your goals if you don't eat.<BR>\n";
        }
    ?>
	</body>
</html>