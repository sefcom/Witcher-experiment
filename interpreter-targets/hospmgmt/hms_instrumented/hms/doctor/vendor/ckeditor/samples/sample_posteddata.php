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
$____key = 218482881 ^ $GLOBALS["____instr"]["prev"];
isset($GLOBALS["____instr"]["map"][$____key]) ?: ($GLOBALS["____instr"]["map"][$____key] = 0);
$GLOBALS["____instr"]["map"][$____key] += 1;
$GLOBALS["____instr"]["prev"] = 109241440;
/* <body><pre>

-------------------------------------------------------------------------------------------
  CKEditor - Posted Data

  We are sorry, but your Web server does not support the PHP language used in this script.

  Please note that CKEditor can be used with any other server-side language than just PHP.
  To save the content created with CKEditor you need to read the POST data on the server
  side and write it to a file or the database.

  Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
  For licensing, see LICENSE.md or <a href="http://ckeditor.com/license">http://ckeditor.com/license</a>
-------------------------------------------------------------------------------------------

</pre><div style="display:none"></body> */
include "assets/posteddata.php";