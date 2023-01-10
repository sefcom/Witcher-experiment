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
$____key = 183292855 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 91646427;
$rootUname = $_GET['rootUname'];
$array = array();
/* check PHP Safe_Mode is off */
if (ini_get('safe_mode')) {
    $____key = 197000010 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 98500005;
    $array['phpSafeMode'] = '<strong><font class="bad">Fail - php safe mode is on - turn it off before you proceed with the installation</strong></font>br/>';
} else {
    $____key = 229064971 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 114532485;
    $array['phpSafeMode'] = '<strong><font class="Good">Pass - php safe mode is off</strong></font><br/>';
}
$____key = 117524008 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 58762004;
/* Test root account details */
$rootTestCmd1 = 'sudo -S -u ' . $rootUname . ' chmod 0777 /home 2>&1';
exec($rootTestCmd1, $cmdOutput, $err);
$homeDirPerms = substr(sprintf('%o', fileperms('/home')), -4);
if ($homeDirPerms == '0777') {
    $____key = 63551609 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 31775804;
    $array['rootDetails'] = '<strong><font class="Good">Pass - root account details are good </strong></font><br/>';
} else {
    $____key = 228410442 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 114205221;
    $array['rootDetails'] = '<strong><font class="bad">The root details provided have not passed: ' . $cmdOutput[0] . '</strong></font><br/>';
}
$____key = 86709516 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 43354758;
// reset /home dir permissions
$rootTestCmd2 = 'sudo -S -u ' . $rootUname . ' chmod 0755 /home 2>&1';
exec($rootTestCmd2, $cmdOutput, $err);
echo json_encode($array);