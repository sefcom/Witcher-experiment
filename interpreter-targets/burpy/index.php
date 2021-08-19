<html>
<body>
<form>
<?php

function get_name($a){
    return 'name'.$a;
}

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "example";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


$pid = $_GET['pid'];
$act = $_GET["act"];
if ($act == "a"){ ?>
  Name: <input name="pname" value="">

<?php } else { ?>
  Name: <?= get_name($pid) ?>
  <input name="pid" value="<?= $pid ?>">
<?php } ?>
  Type: <select name="ptype">
    <option value="dog_red">Red Dog</option>
    <option value="dog_grey">Grey Dog</option>
  </select>
  <input type="hidden" name="act" value="a"/>
  <input type="submit"/>
</form>

<?php
$pname = $_GET["pname"];
$inp = explode('_', $_GET["ptype"]);
$color = $inp[1];
$pid = isset($pid) ? $pid : uniqid();
if (count($inp) >= 2 && $act == "a") {
    $pid   = $conn->real_escape_string($pid);
    $pname = $conn->real_escape_string($pname);
    $color = $conn->real_escape_string($color);

    $sql   = "INSERT into {$inp[0]} ";
    $sql  .= "(id, pname, color) VALUES ('{$pid}','{$pname}','{$color}')";

    echo '[QUERY1]: '.$sql;
    $ret   = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    var_dump($ret);
}
    else if (count($inp) >= 2 && $act == "u"){ //TBD
        if (get_name($pid) != null){
            $sql = "UPDATE dog SET color= '{$color}' ";
            $sql .= "WHERE id = '{$pid}'";
            echo '[QUERY2]: '.$sql;
            $ret = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        }
    }

?>
</html>
</body>
