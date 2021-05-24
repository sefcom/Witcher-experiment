<?php
include('./config.php');
// nv == necessary value to reach vul
// vul == vulnerable variable

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Testing Trace</title>
	</head>
	<body>
	<?php
	    // needs to keep nv1; add nv2 and nv3; and keep vul1
	    echo "Starting EVAL <BR>\n";

	    if(isset($_POST['nv1'])) {
		    if(isset($_POST['nv2'])) {
		        if(isset($_POST['nv3'])) {
		            if(isset($_POST['nv4'])) {
		                if(isset($_POST['nv5'])) {
		                    if(isset($_POST['nv6'])) {
		                        if(isset($_POST['nv7'])) {
		                            if(isset($_POST['nv8'])) {
		                                if(isset($_POST['nv9'])) {
		                                    if(isset($_POST['nv10'])) {
                                                $vul1=$_GET['vul1'];
                                                $ret=mysqli_query($con,"select * from tblpatient where ID='$vul1'");
                                                echo "<BR>MADE it to query with `". $vul1 . "`\n<BR>";
                                            } else {
                                                echo "<BR>MISSING nv10\n<BR>";
                                            }
                                        } else {
                                            echo "<BR>MISSING nv9\n<BR>";
                                        }
                                    } else {
                                         echo "<BR>MISSING nv8\n<BR>";
                                    }
                                } else {
                                    echo "<BR>MISSING nv7\n<BR>";
                                }
                            } else {
                                echo "<BR>MISSING nv6\n<BR>";
                            }
                        } else {
                          echo "<BR>MISSING nv5\n<BR>";
                        }
                    } else {
                        echo "<BR>MISSING nv4\n<BR>";
                    }
                } else {
                    echo "<BR>MISSING nv3\n<BR>";
                }
            } else {
                echo "<BR>MISSING nv2\n<BR>";
            }
        }  else {
            echo "<BR>MISSING nv1\n<BR>";
        }
    ?>
	</body>
</html>