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
	    $nv1=$_GET["nv1"];
	    $nv2=$_GET["nv2"];
	    $nv3=$_GET["nv3"];
	    $foundadd = FALSE;
        $founddelete = FALSE;
        $foundmodify = FALSE;
	    if ($nv1 == "add"){
	        $foundadd = TRUE;
	    }
	    if ($nv2 == "delete"){
            $founddelete = TRUE;
        }
        if ($nv3 == "modify"){
            $foundmodify = TRUE;
        }
        if ($foundadd && $founddelete && $foundmodify){
            echo "All sels match the expectation!!! ";
            include('./config.php');
            $ret=mysqli_query($con,"select * from tblpatient where ID='");
            echo " " . $ret . "<BR>\n";
        }

    ?>
	</body>
</html>
