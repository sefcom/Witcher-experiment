<?php

  register_shutdown_function(function() {{
        $jdata = json_encode(xdebug_get_code_coverage());
	$fp = fopen('/tmp/request.log', 'a');
	$fn = $_SERVER["SCRIPT_FILENAME"];
	fwrite($fp, $fn."\n");
	$req_dump = print_r($_REQUEST, TRUE);
	fwrite($fp, $req_dump);

	$req_dump = print_r($_COOKIE, TRUE);
        fwrite($fp, $req_dump);	
	fwrite($fp, "\n----------------------------------------------------------------------------------------------\n"
	fclose($fp); 
	$fn = $_SERVER["SCRIPT_FILENAME"];
	$fn = str_replace("/","+",$fn);
	$dt = date("Y_m_d_H_i_s_u");
	$outfn = "/tmp/trace_" . $fn . "_" . $dt . ".json";
	echo $outfn;
        $jdataout = fopen($outfn, "w") or die("Unable to open file!");
        fwrite($jdataout, $jdata);
        fclose($jdataout);
    	echo "SAVED trace to file /tmp/testingcc_prepend.json\n\n";
  }});
  
  xdebug_start_code_coverage(XDEBUG_CC_UNUSED | XDEBUG_CC_DEAD_CODE);
  //xdebug_start_code_coverage();
  
?>