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
$____key = 26935038 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 13467519;
// if(!mysql_connect("localhost","root",""))
// {
//      die('oops connection problem ! --> '.mysql_error());
// }
// if(!mysql_select_db("db_healthcare"))
// {
//      die('oops database selection problem ! --> '.mysql_error());
// }
?>

<?php 
//      define('_HOST_NAME','localhost');
//      define('_DATABASE_NAME','db_healthcare');
//      define('_DATABASE_USER_NAME','root');
//      define('_DATABASE_PASSWORD','');
//      $MySQLiconn = new MySQLi(_HOST_NAME,_DATABASE_USER_NAME,_DATABASE_PASSWORD,_DATABASE_NAME);
//      if($MySQLiconn->connect_errno)
//      {
//        die("ERROR : -> ".$MySQLiconn->connect_error);
//      }
//
?>
<!-- mysql -->
 <?php 
// if(!mysql_connect("mysql.hostinger.my","u346953953_admin","database123"))
// {
//      die('oops connection problem ! --> '.mysql_error());
// }
// if(!mysql_select_db("u346953953_db"))
// {
//      die('oops database selection problem ! --> '.mysql_error());
// }
//
?>

<!-- mysqli -->
<?php 
// $con = mysqli_connect("mysql.hostinger.my","u346953953_admin","database123","u346953953_db");
// // Check connection
// if (mysqli_connect_errno())
//   {
//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
//   }
$con = mysqli_connect("127.0.0.1", "das", "das", "das");
// Check connection
if (mysqli_connect_errno()) {
    $____key = 20943792 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 10471896;
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$____key = 11493265 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 5746632;