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
$____key = 221547122 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 110773561;
require_once "/home/rconfig/classes/usersession.class.php";
require_once "/home/rconfig/classes/ADLog.class.php";
require_once "/home/rconfig/config/functions.inc.php";
$log = ADLog::getInstance();
if (!$session->logged_in) {
    $____key = 116112222 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 58056111;
    echo 'Don\'t bother trying to hack me!!!!!<br /> This hack attempt has been logged';
    $log->Warn("Security Issue: Some tried to access this file directly from IP: " . $_SERVER['REMOTE_ADDR'] . " & Username: " . $session->username . " (File: " . $_SERVER['PHP_SELF'] . ")");
    // need to add authentication to this script
    header("Location: " . $config_basedir . "login.php");
} else {
    $____key = 248705168 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 124352584;
    // Send test mail from settings.php 'Test mail Server' button
    require_once "../../../classes/db2.class.php";
    require_once "../../../classes/phpmailer/class.phpmailer.php";
    $log = ADLog::getInstance();
    $db2 = new db2();
    $db2->query("SELECT smtpServerAddr, smtpFromAddr, smtpRecipientAddr, smtpAuth, smtpAuthUser, smtpAuthPass FROM settings");
    $row = $db2->single();
    $smtpServerAddr = $row['smtpServerAddr'];
    $smtpFromAddr = $row['smtpFromAddr'];
    $smtpRecipientAddr = $row['smtpRecipientAddr'];
    if ($row['smtpAuth'] == 1) {
        $____key = 169991962 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 84995981;
        $smtpAuth = $row['smtpAuth'];
        $smtpAuthUser = $row['smtpAuthUser'];
        $smtpAuthPass = $row['smtpAuthPass'];
    }
    $____key = 244451034 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 122225517;
    $mail = new PHPMailer();
    $body = 'Test mail from rConfig';
    // next line per http://stackoverflow.com/questions/7706918/eregi-replace-data-what-does-this-line-do
    $body = preg_replace("[\\\\]", '', $body);
    $mail->IsSMTP();
    // telling the class to use SMTP
    if ($row['smtpAuth'] == 1) {
        $____key = 130761813 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 65380906;
        $mail->SMTPAuth = true;
        // enable SMTP authentication
        $mail->Username = $smtpAuthUser;
        // SMTP account username
        $mail->Password = $smtpAuthPass;
        // SMTP account password
    }
    $____key = 78196352 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 39098176;
    $mail->SMTPKeepAlive = true;
    // SMTP connection will not close after each email sent
    $mail->Host = $smtpServerAddr;
    // sets the SMTP server
    $mail->Port = 25;
    // set the SMTP port for the SMTP server
    $mail->SetFrom($smtpFromAddr, 'Admin@rConfig.com');
    $mail->Subject = "PHPMailer Test Subject via smtp, basic with authentication";
    $mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
    // optional, comment out and test
    $mail->MsgHTML($body);
    $smtpRecipientAddresses = explode("; ", $smtpRecipientAddr);
    foreach ($smtpRecipientAddresses as $emailAddr) {
        $____key = 210114876 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 105057438;
        $mail->AddAddress($emailAddr);
    }
    $____key = 260264905 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 130132452;
    if (!$mail->Send()) {
        $____key = 204726194 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 102363097;
        $db2->query("UPDATE settings SET smtpLastTest = 'Failed', smtpLastTestTime = NOW()");
        $db2->execute();
        $log->Fatal('Fatal: Test Mailer Error (' . str_replace("@", "&#64;", $smtpRecipientAddr) . ') ' . $mail->ErrorInfo);
        $response = json_encode(array('failure' => true));
    } else {
        $____key = 225751000 ^ $GLOBALS["____instr"]["prev"];
        isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
        $GLOBALS["____instr"]["map"][$____key] += 1;
        $GLOBALS["____instr"]["prev"] = 112875500;
        $q = $db2->query("UPDATE settings SET smtpLastTest = 'Passed', smtpLastTestTime = NOW()");
        $db2->execute();
        $log->Info('Info: Test Message sent to :' . $smtpRecipientAddr . ' (' . str_replace("@", "&#64;", $smtpRecipientAddr) . ')');
        $response = json_encode(array('success' => true));
    }
    $____key = 77112557 ^ $GLOBALS["____instr"]["prev"];
    isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
    $GLOBALS["____instr"]["map"][$____key] += 1;
    $GLOBALS["____instr"]["prev"] = 38556278;
    // Clear all addresses and attachments for next loop
    $mail->ClearAddresses();
    $mail->ClearAttachments();
    echo $response;
}
$____key = 151251491 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 75625745;