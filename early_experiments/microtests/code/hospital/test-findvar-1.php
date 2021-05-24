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
	    if(isset($_POST['ao3'])) {
	        if($_POST['ao3'] == "add") {
                $ret=mysqli_query($con,"select * from tblpatient where ID='");
                echo "<BR>MADE it to query with `". $vul1 . "`\n<BR>";
            }
		}  else {
            echo "<BR>MISSING ao3\n<BR>";
        }
    ?>
	</body>
</html>
