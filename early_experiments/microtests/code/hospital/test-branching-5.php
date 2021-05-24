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
	   $found25 = ($_GET['nv5'] == "add"); // found in string
	   $found12 = substr( $_GET['nv4'], 0, 2 ) === "12";
       if(is_numeric($_GET['nv2'])) {
            echo "Level 1 achieved<BR>\n";
            if(isset($_GET['av3']))  {
                echo "Level 2 achieved<BR>\n";
                if($found12) {
                    echo "Level 3 achieved<BR>\n";
                    if ($found25){
                        echo "Level 4 achieved <BR>\n";
                        return TRUE;
                    }
                }
            }
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

        if (isset($_GET['av3']) )  {
            echo "Passed level 2<BR>\n";
        }
        if (substr($_GET['nv4'], 0, 2 ) === "12") {
            echo "Passed level 3<BR>\n";
        }
        if (($_GET['nv5'] == "add") === false )  {
           echo "Passed level 4<BR>\n";
        }

    ?>
	</body>
</html>